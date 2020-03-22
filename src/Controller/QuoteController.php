<?php


namespace App\Controller;


use App\Entity\Quote;
use App\Repository\BasePremiumRepository;
use App\Repository\QuotesRepository;
use App\Resources\TraitPostcodesUnitFilter;
use App\Services\CalculatePremiumService;
use App\Services\VehicleLookupService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;


class QuoteController extends AbstractController
{
    private const RATING_DEFAULT = '1';

    use TraitPostcodesUnitFilter {
        TraitPostcodesUnitFilter::getDistrict as traitPostcodeDistrict;
    }

    protected $basePremium;

    protected $calculatePremiumService;

    protected $quotesRepository;

    /**
     * QuoteController constructor.
     * @param BasePremiumRepository $basePremium
     * @param CalculatePremiumService $calculatePremiumService
     * @param QuotesRepository $quotesRepository
     */
    public function __construct(BasePremiumRepository $basePremium,
                                CalculatePremiumService $calculatePremiumService,
                                QuotesRepository $quotesRepository)
    {
        $this->basePremium = $basePremium;
        $this->calculatePremiumService = $calculatePremiumService;
        $this->quotesRepository = $quotesRepository;
    }

    /**
     * @Route("/quote", name="quote")
     * @param request $request
     * @param ValidatorInterface $validator
     * @param VehicleLookupService $vehicleLookup
     * @return JsonResponse
     */
    public function index(request $request,
                          ValidatorInterface $validator,
                          VehicleLookupService $vehicleLookup): JsonResponse
    {
        //Set default response
        $response = [
            'error' => 'failed',
            'messages' => 'An error has occurred'
        ];

        $quote = new Quote();

        $quote
            ->setPolicyNumber(rand(1, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9))
            ->setAge((int) $request->request->get('age'))
            ->setPostcode(strtoupper($request->request->get('postcode')))
            ->setRegNo(strtoupper($request->request->get('regNo')));

        $errors = $validator->validate($quote);

        if (count($errors) === 0) {
            /* Fetch Base Premium */
            $basePremium = $this->basePremium->getBasePremium();

            if (isset($basePremium['base_premium'])) {
                /* Fetch Postcode District */
                $postcodeDistrict = $this->traitPostcodeDistrict($quote->getPostcode());

                /* Fetch Postcode ABI Code from API service (Faked for now) */
                $vehicleAbiCode = $vehicleLookup->getVehicleAbi($quote->getRegNo());

                /* Calculate and fetch the customer premium */
                $customerPremium = $this->calculatePremiumService->calculatePremium(
                    $basePremium['base_premium'],
                    [
                        'App:AgeRating' => [
                            'age' => $quote->getAge()
                        ],
                        'App:PostcodeRating' => [
                            'postcodeArea' => $postcodeDistrict
                        ],
                        'App:AbiCodeRating' => [
                            'abiCode' => $vehicleAbiCode
                        ]
                    ], SELF::RATING_DEFAULT);

                /* Save the Quote */
                $quote
                    ->setAbiCode($vehicleAbiCode)
                    ->setPremium(number_format($customerPremium, 2));

                if (!empty($this->quotesRepository->save($quote))) {
                    $response = [
                        'status' => 'success',
                        'premium' => $quote->getPremium()
                    ];
                }
            }
        } else {
            $response = [
                'status' => 'Error invalid input',
            ];
        }

        return $this->json($response);
    }
}

<?php

namespace App\Controller;

use App\Entity\Quote;
use App\Resources\Postcodes;
use App\Services\VehicleLookup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\BasePremium;
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class QuoteController extends AbstractController
{
    use Postcodes;

    protected $basePremium;

    /**
     * QuoteController constructor.
     * @param BasePremium $basePremium
     */
    public function __construct(BasePremium $basePremium)
    {
        $this->basePremium = $basePremium;
    }

    /**
     * @Route("/quote", name="quote")
     * @param request $request
     * @param ValidatorInterface $validator
     * @param VehicleLookup $vehicleLookup
     * @return JsonResponse
     */
    public function index(request $request, ValidatorInterface $validator, VehicleLookup $vehicleLookup): JsonResponse
    {
        $response = [
            'error' => 'failed',
            'messages' => 'System failure'
        ];

        $quote = new Quote();

        $errors = $validator->validate($quote);

        if (count($errors) === 0) {
            $basePremium = $this->basePremium->getBasePremium();

            if (isset($basePremium['base_premium'])) {
                $vehicleAbiCode = $vehicleLookup->getVehicleAbi('fx12xsd');

                $postcodeDistrict = Postcodes::getDistrict('pe2 9ra');

                //todo: fetch rating factors age, postcode area, and ABI code

                //todo: save quote information to the quote table
                $response = [
                    'base_premium' => $basePremium['base_premium'],
                    'rating_factors' => [
                        'age' => '',
                        'postcode' => '',
                        'ABI' => '',
                    ],
                    'total_cost' => ''
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid input'
            ];
        }

        return $this->json($response);
    }
}

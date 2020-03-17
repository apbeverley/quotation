<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\BasePremium;

class QuoteController extends AbstractController
{
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
     * @return JsonResponse
     */
    public function index(request $request)
    {
        $basePremium = $this->basePremium->getBasePremium();

        if (isset($basePremium['base_premium'])) {
            //todo: fetch rating factors age, postcode area, and ABI code

            //todo: save quote information to the quote table
        }

        return $this->json([
            'base_premium' => $basePremium['base_premium'],
            'rating_factors' => [
                'age' => '',
                'postcode' => '',
                'ABI' => '',
            ],
            'total_cost' => ''
        ]);
    }
}

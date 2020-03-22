<?php


namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class CalculatePremiumService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function calculatePremium(float $premium, array $ratingsArray, int $default)
    {
        if (!empty($ratingsArray)) {
            foreach ($ratingsArray as $repository => $criteria) {
                $ratingAdjustment = $this->em->getRepository($repository)->findOneBy($criteria);

                if ($ratingAdjustment) {
                    $premium = $premium * $ratingAdjustment->getRatingFactor();
                } else {
                    $premium = $premium * $default;
                }
            }
        }

        return $premium;
    }
}
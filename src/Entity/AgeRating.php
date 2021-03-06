<?php

namespace App\Entity;

use App\Model\QuoteRatingInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * AgeRating
 *
 * @ORM\Table(name="age_rating")
 * @ORM\Entity(repositoryClass="App\Repository\AgeRatingRepository")
 */
class AgeRating implements QuoteRatingInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rating_factor", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ratingFactor;

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getRatingFactor(): ?string
    {
        return $this->ratingFactor;
    }

    public function setRatingFactor(?string $ratingFactor): self
    {
        $this->ratingFactor = $ratingFactor;

        return $this;
    }


}

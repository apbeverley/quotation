<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbiCodeRating
 *
 * @ORM\Table(name="abi_code_rating")
 * @ORM\Entity(repositoryClass="App\Repository\AbiCodeRepository")
 */
class AbiCodeRating
{
    /**
     * @var string
     *
     * @ORM\Column(name="abi_code", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $abiCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rating_factor", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ratingFactor;

    public function getAbiCode(): ?string
    {
        return $this->abiCode;
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

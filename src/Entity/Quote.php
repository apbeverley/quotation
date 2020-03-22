<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Quote
 *
 * @ORM\Table(name="quote")
 * @ORM\Entity(repositoryClass="App\Repository\QuotesRepository")
 */
class Quote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="policy_number", type="string", length=20, nullable=false)
     */
    private $policyNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Range(
     * min = 17,
     * max = 100,
     * minMessage = "The minimum age requirement not met you must be {{ limit }} yrs old to apply",
     * maxMessage = "The maxium age limit is {{ limit }} yrs old to apply"
     * )
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/^\s*(([A-Z]{1,2})[0-9][0-9A-Z]?)\s*(([0-9])[A-Z]{2})\s*$/",
     *     message="Invalid postcode"
     * )
     */
    private $postcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg_no", type="string", length=10, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/\b([A-Z]{3}\s?(\d{3}|\d{2}|d{1})\s?[A-Z])|([A-Z]\s?(\d{3}|\d{2}|\d{1})\s?[A-Z]{3})|(([A-HK-PRSVWY][A-HJ-PR-Y])\s?([0][2-9]|[1-9][0-9])\s?[A-HJ-PR-Z]{3})\b/",
     *     message="Invalid registration number"
     * )
     */
    private $regNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abi_code", type="string", length=10, nullable=true)
     *
     */
    private $abiCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="premium", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $premium;

    public function getId()
    {
        return $this->id;
    }

    public function setPolicyNumber(string $policyNumber): Quote
    {
        $this->policyNumber = $policyNumber;

        return $this;
    }

    public function setAge(int $age): Quote
    {
        $this->age = $age;

        return $this;
    }

    public function setRegNo(string $regNo): Quote
    {
        $this->regNo = $regNo;

        return $this;
    }

    public function setPostcode(string $postcode): Quote
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function setAbiCode(string $abiCode): Quote
    {
        $this->abiCode = $abiCode;

        return $this;
    }

    public function setPremium(float $premium): Quote
    {
        $this->premium = $premium;

        return $this;
    }

    public function getPolicyNumber(): ?string
    {
        return $this->policyNumber;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function getRegNo(): ?string
    {
        return $this->regNo;
    }

    public function getAbiCode(): ?string
    {
        return $this->abiCode;
    }

    public function getPremium(): ?string
    {
        return $this->premium;
    }
}

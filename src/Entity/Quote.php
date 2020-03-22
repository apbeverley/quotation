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
     * @Assert\Length(
     * min = 17,
     * max = 120,
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
     *     pattern="/^((GIR &0AA)|((([A-PR-UWYZ][A-HK-Y]?[0-9][0-9]?)|(([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRV-Y]))) &[0-9][ABD-HJLNP-UW-Z]{2}))$/",
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
     *     pattern="/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}/",
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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Quote
 *
 * @ORM\Table(name="quote")
 * @ORM\Entity
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
}

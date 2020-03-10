<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=true)
     */
    private $postcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg_no", type="string", length=10, nullable=true)
     */
    private $regNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abi_code", type="string", length=10, nullable=true)
     */
    private $abiCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="premium", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $premium;


}

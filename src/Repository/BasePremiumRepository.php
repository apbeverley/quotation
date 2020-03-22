<?php

namespace App\Repository;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;

final class BasePremiumRepository
{
    private const TABLE = 'base_premium';

    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBasePremium(): array
    {
        try {
            $sql = sprintf('select `base_premium` from %s LIMIT 1', SELF::TABLE);

            $statement = $this->entityManager->getConnection()->prepare($sql);

            $statement->execute();

            return $statement->fetch();
        } catch (DBALException $e) {
            return [
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
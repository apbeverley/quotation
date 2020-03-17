<?php declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;

final class BasePremium
{
    protected $entityManager;

    protected $tblName = 'base_premium';

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBasePremium(): array
    {
        try {
            $sql = sprintf('select `base_premium` from %s LIMIT 1', $this->tblName);

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
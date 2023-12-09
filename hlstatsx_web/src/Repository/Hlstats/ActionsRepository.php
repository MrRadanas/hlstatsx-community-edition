<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Actions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Actions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actions[]    findAll()
 * @method Actions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actions::class);
    }
}

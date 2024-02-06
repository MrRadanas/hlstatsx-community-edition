<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\MapsCounts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MapsCounts|null find($id, $lockMode = null, $lockVersion = null)
 * @method MapsCounts|null findOneBy(array $criteria, array $orderBy = null)
 * @method MapsCounts[]    findAll()
 * @method MapsCounts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MapsCountsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MapsCounts::class);
    }
}

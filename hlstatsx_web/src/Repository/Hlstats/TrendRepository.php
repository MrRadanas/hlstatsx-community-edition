<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Trend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trend|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trend|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trend[]    findAll()
 * @method Trend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trend::class);
    }
}

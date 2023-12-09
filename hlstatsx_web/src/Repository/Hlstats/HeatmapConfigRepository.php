<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\HeatmapConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HeatmapConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeatmapConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeatmapConfig[]    findAll()
 * @method HeatmapConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeatmapConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeatmapConfig::class);
    }
}

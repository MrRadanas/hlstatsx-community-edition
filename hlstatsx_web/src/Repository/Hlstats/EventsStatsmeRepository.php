<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsStatsme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsStatsme|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsStatsme|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsStatsme[]    findAll()
 * @method EventsStatsme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsStatsmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsStatsme::class);
    }
}

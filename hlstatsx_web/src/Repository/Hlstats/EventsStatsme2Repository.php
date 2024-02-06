<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsStatsme2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsStatsme2|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsStatsme2|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsStatsme2[]    findAll()
 * @method EventsStatsme2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsStatsme2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsStatsme2::class);
    }
}

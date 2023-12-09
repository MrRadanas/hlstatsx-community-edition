<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsLatency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsLatency|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsLatency|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsLatency[]    findAll()
 * @method EventsLatency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsLatencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsLatency::class);
    }
}

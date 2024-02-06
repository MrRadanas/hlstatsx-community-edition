<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsStatsmetime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsStatsmetime|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsStatsmetime|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsStatsmetime[]    findAll()
 * @method EventsStatsmetime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsStatsmetimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsStatsmetime::class);
    }
}

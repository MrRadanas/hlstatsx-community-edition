<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsEntries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsEntries|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsEntries|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsEntries[]    findAll()
 * @method EventsEntries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsEntriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsEntries::class);
    }
}

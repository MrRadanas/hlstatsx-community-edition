<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsDisconnects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsDisconnects|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsDisconnects|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsDisconnects[]    findAll()
 * @method EventsDisconnects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsDisconnectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsDisconnects::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsConnects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsConnects|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsConnects|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsConnects[]    findAll()
 * @method EventsConnects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsConnectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsConnects::class);
    }
}

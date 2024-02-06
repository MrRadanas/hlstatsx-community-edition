<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsRcon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsRcon|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsRcon|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsRcon[]    findAll()
 * @method EventsRcon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsRconRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsRcon::class);
    }
}

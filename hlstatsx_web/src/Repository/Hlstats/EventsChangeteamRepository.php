<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsChangeteam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsChangeteam|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsChangeteam|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsChangeteam[]    findAll()
 * @method EventsChangeteam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsChangeteamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsChangeteam::class);
    }
}

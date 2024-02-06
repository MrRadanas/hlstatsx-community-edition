<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsChangerole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsChangerole|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsChangerole|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsChangerole[]    findAll()
 * @method EventsChangerole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsChangeroleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsChangerole::class);
    }
}

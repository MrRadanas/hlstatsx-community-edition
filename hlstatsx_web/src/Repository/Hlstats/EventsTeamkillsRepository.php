<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsTeamkills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsTeamkills|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsTeamkills|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsTeamkills[]    findAll()
 * @method EventsTeamkills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsTeamkillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsTeamkills::class);
    }
}

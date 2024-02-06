<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsTeambonuses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsTeambonuses|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsTeambonuses|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsTeambonuses[]    findAll()
 * @method EventsTeambonuses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsTeambonusesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsTeambonuses::class);
    }
}

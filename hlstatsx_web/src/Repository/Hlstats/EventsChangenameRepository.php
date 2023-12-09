<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsChangename;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsChangename|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsChangename|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsChangename[]    findAll()
 * @method EventsChangename[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsChangenameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsChangename::class);
    }
}

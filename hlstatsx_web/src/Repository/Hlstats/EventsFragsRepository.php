<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsFrags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsFrags|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsFrags|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsFrags[]    findAll()
 * @method EventsFrags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsFragsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsFrags::class);
    }
}

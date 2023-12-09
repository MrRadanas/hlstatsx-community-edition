<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsChat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsChat|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsChat|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsChat[]    findAll()
 * @method EventsChat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsChatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsChat::class);
    }
}

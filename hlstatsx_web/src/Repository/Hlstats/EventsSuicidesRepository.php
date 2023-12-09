<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\EventsSuicides;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventsSuicides|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventsSuicides|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventsSuicides[]    findAll()
 * @method EventsSuicides[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsSuicidesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventsSuicides::class);
    }
}

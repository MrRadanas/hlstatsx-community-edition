<?php

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Livestats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livestats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livestats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livestats[]    findAll()
 * @method Livestats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivestatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livestats::class);
    }
}

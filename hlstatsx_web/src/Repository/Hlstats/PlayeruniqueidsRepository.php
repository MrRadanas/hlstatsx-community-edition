<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Playeruniqueids;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Playeruniqueids|null find($id, $lockMode = null, $lockVersion = null)
 * @method Playeruniqueids|null findOneBy(array $criteria, array $orderBy = null)
 * @method Playeruniqueids[]    findAll()
 * @method Playeruniqueids[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayeruniqueidsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Playeruniqueids::class);
    }
}

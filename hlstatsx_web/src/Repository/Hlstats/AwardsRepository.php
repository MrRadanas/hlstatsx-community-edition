<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Awards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Awards|null find($id, $lockMode = null, $lockVersion = null)
 * @method Awards|null findOneBy(array $criteria, array $orderBy = null)
 * @method Awards[]    findAll()
 * @method Awards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AwardsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Awards::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Ranks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ranks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ranks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ranks[]    findAll()
 * @method Ranks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RanksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ranks::class);
    }
}

<?php

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\PlayersAwards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayersAwards|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayersAwards|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayersAwards[]    findAll()
 * @method PlayersAwards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayersAwardsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayersAwards::class);
    }
}

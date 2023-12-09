<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\PlayersRibbons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayersRibbons|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayersRibbons|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayersRibbons[]    findAll()
 * @method PlayersRibbons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayersRibbonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayersRibbons::class);
    }
}

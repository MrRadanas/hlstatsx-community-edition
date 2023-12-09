<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\PlayersHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayersHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayersHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayersHistory[]    findAll()
 * @method PlayersHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayersHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayersHistory::class);
    }
}

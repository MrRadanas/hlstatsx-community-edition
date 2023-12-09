<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Playernames;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Playernames|null find($id, $lockMode = null, $lockVersion = null)
 * @method Playernames|null findOneBy(array $criteria, array $orderBy = null)
 * @method Playernames[]    findAll()
 * @method Playernames[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayernamesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Playernames::class);
    }
}

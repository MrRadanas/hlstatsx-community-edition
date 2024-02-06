<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Servers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Servers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Servers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Servers[]    findAll()
 * @method Servers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Servers::class);
    }
}

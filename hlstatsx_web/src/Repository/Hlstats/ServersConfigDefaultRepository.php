<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\ServersConfigDefault;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServersConfigDefault|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServersConfigDefault|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServersConfigDefault[]    findAll()
 * @method ServersConfigDefault[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServersConfigDefaultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServersConfigDefault::class);
    }
}

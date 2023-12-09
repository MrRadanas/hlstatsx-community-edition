<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\ServerLoad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServerLoad|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServerLoad|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServerLoad[]    findAll()
 * @method ServerLoad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServerLoadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServerLoad::class);
    }
}

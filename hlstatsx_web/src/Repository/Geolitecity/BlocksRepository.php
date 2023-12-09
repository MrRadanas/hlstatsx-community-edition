<?php

declare(strict_types=1);

namespace App\Repository\Geolitecity;

use App\Entity\Geolitecity\Blocks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blocks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blocks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blocks[]    findAll()
 * @method Blocks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blocks::class);
    }
}

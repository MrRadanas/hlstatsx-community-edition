<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Ribbons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ribbons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ribbons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ribbons[]    findAll()
 * @method Ribbons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RibbonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ribbons::class);
    }
}

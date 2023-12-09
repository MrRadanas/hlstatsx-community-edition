<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Weapons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Weapons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weapons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weapons[]    findAll()
 * @method Weapons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Weapons::class);
    }
}

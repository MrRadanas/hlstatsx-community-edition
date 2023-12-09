<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\ModsDefaults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModsDefaults|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModsDefaults|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModsDefaults[]    findAll()
 * @method ModsDefaults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModsDefaultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModsDefaults::class);
    }
}

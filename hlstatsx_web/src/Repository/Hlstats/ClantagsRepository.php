<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Clantags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Clantags|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clantags|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clantags[]    findAll()
 * @method Clantags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClantagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clantags::class);
    }
}

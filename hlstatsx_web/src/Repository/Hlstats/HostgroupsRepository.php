<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\Hostgroups;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hostgroups|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hostgroups|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hostgroups[]    findAll()
 * @method Hostgroups[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostgroupsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hostgroups::class);
    }
}

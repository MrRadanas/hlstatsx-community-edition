<?php

declare(strict_types=1);

namespace App\Repository\Hlstats;

use App\Entity\Hlstats\ServersVoicecomm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServersVoicecomm|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServersVoicecomm|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServersVoicecomm[]    findAll()
 * @method ServersVoicecomm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServersVoicecommRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServersVoicecomm::class);
    }
}

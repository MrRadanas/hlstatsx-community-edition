<?php

namespace App\Repository;

use App\Entity\TinyGnome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TinyGnome>
 *
 * @method TinyGnome|null find($id, $lockMode = null, $lockVersion = null)
 * @method TinyGnome|null findOneBy(array $criteria, array $orderBy = null)
 * @method TinyGnome[]    findAll()
 * @method TinyGnome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TinyGnomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TinyGnome::class);
    }

//    /**
//     * @return TinyGnome[] Returns an array of TinyGnome objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TinyGnome
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

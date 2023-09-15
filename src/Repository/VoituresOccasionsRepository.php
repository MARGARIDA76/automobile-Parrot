<?php

namespace App\Repository;

use App\Entity\VoituresOccasions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VoituresOccasions>
 *
 * @method VoituresOccasions|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoituresOccasions|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoituresOccasions[]    findAll()
 * @method VoituresOccasions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoituresOccasionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoituresOccasions::class);
    }

//    /**
//     * @return VoituresOccasions[] Returns an array of VoituresOccasions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VoituresOccasions
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\Veille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Veille>
 *
 * @method Veille|null find($id, $lockMode = null, $lockVersion = null)
 * @method Veille|null findOneBy(array $criteria, array $orderBy = null)
 * @method Veille[]    findAll()
 * @method Veille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VeilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Veille::class);
    }

//    /**
//     * @return Veille[] Returns an array of Veille objects
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

//    public function findOneBySomeField($value): ?Veille
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

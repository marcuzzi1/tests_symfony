<?php

namespace App\Repository;

use App\Entity\DataToProceed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DataToProceed|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataToProceed|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataToProceed[]    findAll()
 * @method DataToProceed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataToProceedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataToProceed::class);
    }

    // /**
    //  * @return DataToProceed[] Returns an array of DataToProceed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataToProceed
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

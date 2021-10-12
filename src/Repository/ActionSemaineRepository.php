<?php

namespace App\Repository;

use App\Entity\ActionSemaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActionSemaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActionSemaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActionSemaine[]    findAll()
 * @method ActionSemaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionSemaineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActionSemaine::class);
    }

    // /**
    //  * @return ActionSemaine[] Returns an array of ActionSemaine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActionSemaine
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

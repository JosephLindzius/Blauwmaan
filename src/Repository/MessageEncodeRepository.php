<?php

namespace App\Repository;

use App\Entity\MessageEncode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MessageEncode|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageEncode|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageEncode[]    findAll()
 * @method MessageEncode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageEncodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageEncode::class);
    }


    // /**
    //  * @return MessageEncode[] Returns an array of MessageEncode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MessageEncode
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

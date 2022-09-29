<?php

namespace App\Repository;

use App\Entity\ProductCatalogCart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCatalogCart|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCatalogCart|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCatalogCart[]    findAll()
 * @method ProductCatalogCart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCatalogCartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCatalogCart::class);
    }

    // /**
    //  * @return ProductCatalogCart[] Returns an array of ProductCatalogCart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductCatalogCart
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

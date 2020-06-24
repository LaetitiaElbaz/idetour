<?php

namespace App\Repository;

use App\Entity\Poi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Poi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poi[]    findAll()
 * @method Poi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poi::class);
    }

    /**
     * Find all pois by area
     *
     * @param integer $id
     * @return void
     */
    public function findAllByArea(int $id)
    {
        return $this->createQueryBuilder('p')
            ->select('p,c,d,a') // Select poi:p, city:c, department:d, area:a
            ->join('p.city', 'c') // Join Poi and City with alias 'c'
            ->join('c.department', 'd') // Join City and Department with alias 'd'
            ->join('d.area', 'a') // Join Department and Area with alias 'a'
            ->andWhere('a.id= :id') // Where the area_id equals id sent
            ->setParameter('id', $id) //  Give the placeholder id the value in the function (key,value)
            ->orderBy('p. poiName', 'ASC')
            ->getQuery()
            ->getResult() // getResult for several results
        ;
    }

    /**
     * Find all pois by department
     *
     * @param integer $id
     * @return void
     */
    public function findAllByDepartment(int $id)
    {
        return $this->createQueryBuilder('p')
            ->select('p,c,d,a') // Select poi:p, city:c, department:d, area:a
            ->join('p.city', 'c') // Join Poi and City with alias 'c'
            ->join('c.department', 'd') // Join City and Department with alias 'd'
            ->join('d.area', 'a') // Join Department and Area with alias 'a'
            ->andWhere('d.id= :id') // Where the department_id equals id sent
            ->setParameter('id', $id) // Give the placeholder id the value in the function (key,value)
            ->orderBy('p. poiName', 'ASC')
            ->getQuery()
            ->getResult() // getResult for several results
        ;
    }

    /*
    public function findOneBySomeField($value): ?Poi
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

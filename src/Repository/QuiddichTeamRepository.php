<?php

namespace App\Repository;

use App\Entity\QuiddichTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuiddichTeam>
 *
 * @method QuiddichTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuiddichTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuiddichTeam[]    findAll()
 * @method QuiddichTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuiddichTeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuiddichTeam::class);
    }

    public function add(QuiddichTeam $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(QuiddichTeam $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return QuiddichTeam[] Returns an array of QuiddichTeam objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuiddichTeam
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

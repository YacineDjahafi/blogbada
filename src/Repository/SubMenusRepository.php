<?php

namespace App\Repository;

use App\Entity\SubMenus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubMenus>
 *
 * @method SubMenus|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubMenus|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubMenus[]    findAll()
 * @method SubMenus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubMenusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubMenus::class);
    }
    
   /**
    * @return SubMenus[] Returns an array of SubMenus objects
    */
   public function subMenusByName(): array
   {
       return $this->createQueryBuilder('s')
        //    ->orderBy('s.id', 'ASC') //Pour avoir un ordre
           ->getQuery()
           ->getResult()
       ;
   }
}

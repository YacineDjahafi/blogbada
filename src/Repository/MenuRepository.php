<?php

namespace App\Repository;

use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Menu>
 *
 * @method Menu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu[]    findAll()
 * @method Menu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    public function findMainMenus()
{
    return $this->createQueryBuilder('menu')
        ->andWhere('menu.subMenu IS EMPTY')
        ->orderBy('menu.menuOrder', 'ASC')
        ->getQuery()
        ->getResult();
    }

    public function findSubMenus($parentMenu)
    {
        return $this->createQueryBuilder('menu')
            ->andWhere('menu.subMenu = :parentMenu')
            ->setParameter('parentMenu', $parentMenu)
            ->orderBy('menu.menuOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

}

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

    // Trouver submenus liés à un menu
    public function findByName(string $name): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('m.name')
            ->addSelect('s.name AS subMenuName')
            ->leftJoin('m.subMenuses', 's')
            ->where('m.name = :name')
            ->setParameter('name', $name)
            ->getQuery();

        $results = $qb->getResult();

        // Reformat the results into the desired structure
        $formattedResults = [];
        foreach ($results as $result) {
            $menuName = $result['name'];
            $subMenuName = $result['subMenuName'];

            if (!isset($formattedResults[$menuName])) {
                $formattedResults[$menuName] = [
                    'name' => $menuName,
                    'subMenus' => [],
                ];
            }

            if ($subMenuName !== null) {
                $formattedResults[$menuName]['subMenus'][] = [
                    'name' => $subMenuName,
                ];
            }
        }
        return array_values($formattedResults);
    }
}

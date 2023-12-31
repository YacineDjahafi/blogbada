<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\MenuRepository;
use App\Repository\SubMenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ArticleRepository $articleRepo,
        CategoryRepository $categoryrepo,
        MenuRepository $menuRepository,
        SubMenusRepository $subMenusRepository
    ): Response {

        $menuName = 'NomDuMenu';
        // $menuName comme paramètre pour la méthode findByName
        $subMenus = $subMenusRepository->findByName($menuName);

        return $this->render('home/index.html.twig', [
            'articles' => $articleRepo->findAll(),
            'categories' => $categoryrepo->findAll(),
            'menus' => $menuRepository->findAll(),
            'subMenuses' => $subMenus
        ]);
    }
}

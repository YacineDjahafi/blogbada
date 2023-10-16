<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\MediaRepository;
use App\Repository\MenuRepository;
use App\Repository\SubMenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'article_show')]
    public function show(
        // Présent pour le timestamp
        ?Article $article,
        ArticleRepository $articleRepo,
        CategoryRepository $categoryrepo,
        MenuRepository $menuRepository,
        SubMenusRepository $subMenusRepository,
        MediaRepository $mediaRepository,
    ): Response {
        $menuName = 'NomDuMenu';
        // $menuName comme paramètre pour la méthode findByName
        $subMenus = $subMenusRepository->findByName($menuName);
        $mediaList = $mediaRepository->findAll();

        if (!$article) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'articles' => $articleRepo->findAll(),
            'categories' => $categoryrepo->findAll(),
            'menus' => $menuRepository->findAll(),
            'subMenuses' => $subMenus,
            'mediaList' => $mediaList,
            // 'media' => $mediaRepository->findByName()

        ]);
    }
}

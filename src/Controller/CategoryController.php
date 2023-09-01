<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{slug}', name: 'category_show')]
    public function show(?Category $category): Response
    {
        // Si on a pas de catégorie
        if (!$category){
            // On redirige sur la page d'accueil
            return $this->redirectToRoute('home');
        }
        // return $this->render('category/index.html.twig', [
        //     'entity' => $category,
        //     'articles' => $articleService->getPaginatedArticles($category)
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}

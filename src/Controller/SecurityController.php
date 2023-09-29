<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\MenuRepository;
use App\Repository\SubMenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(
        AuthenticationUtils $authenticationUtils, 
        ArticleRepository $articleRepo,
        CategoryRepository $categoryrepo,
        MenuRepository $menuRepository,
        SubMenusRepository $subMenusRepository
        ): Response
    {
        $menuName = 'NomDuMenu';
        // $menuName comme paramètre pour la méthode findByName
        $subMenus = $subMenusRepository->findByName($menuName);
        if ($this->getUser()) {

            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error,
            'articles' => $articleRepo->findAll(),
            'categories' => $categoryrepo->findAll(),
            'menus' => $menuRepository->findAll(),
            'subMenuses' => $subMenus
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

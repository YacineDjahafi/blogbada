<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Media;
use App\Entity\Menu;
use App\Entity\SubMenus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator, private Security $security
    ) {
    }

    #[Route('/admin', name: 'admin')]
    
    public function index(): Response
    {
        if ($this->security->isGranted('ROLE_ADMIN')) {
        $url = $this->adminUrlGenerator->setController(ArticleCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
        }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BADABOSS');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', 'app_home');
        yield MenuItem::subMenu('Spectacles', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Tous les spectacles', 'fas fa-list', Article::class),
            MenuItem::linkToCrud('Créer un spectacle', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class),
        ]);

        yield MenuItem::subMenu('Navigation (menu)', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Mes Menus', 'fas fa-newspaper', Menu::class),
            MenuItem::linkToCrud('Ajouter un Menu', 'fas fa-plus', Menu::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Sous Menus', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Afficher les sous menus', 'fas fa-list', SubMenus::class),
            MenuItem::linkToCrud('Ajouter un sous menus', 'fas fa-plus', SubMenus::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Médias', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Médiathèque', 'fas fa-list', Media::class),
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Media::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}

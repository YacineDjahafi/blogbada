<?php

namespace App\Controller\Admin;

use App\Entity\SubMenus;
use App\Repository\SubMenusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SubMenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubMenus::class;
    }

    public function __construct(
        private SubMenusRepository $subMenusRepository
    ){
     }
    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom du sous menu');
        yield NumberField::new('submenu_order', 'Ordre');
        yield AssociationField::new('article', 'Article lié', Article::class);
        yield AssociationField::new('category', 'Catégorie liée', Category::class);
        yield TextField::new('link', 'Lien');
        yield BooleanField::new('isVisible', 'Visible');
    }
    
}

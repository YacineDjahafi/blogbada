<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\SubMenus;
use App\Repository\MenuRepository;
use App\Repository\SubMenusRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }   

    public function __construct(
        private MenuRepository $menuRepository,
        private SubMenusRepository $subMenusRepository
        ){
        }
    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom du menu');
        yield NumberField::new('menuOrder', 'Ordre');
        yield ChoiceField::new('subMenuses', 'Sous-menus', SubMenus::class)
            ->allowMultipleChoices()
            ->autocomplete()
            ->setFormTypeOptions(['multiple' => true], ['expanded' => true]);
        yield AssociationField::new('article', 'Article lié', Article::class);
        yield AssociationField::new('category', 'Catégorie liée', Category::class);
        yield TextField::new('link', 'Lien');
        yield BooleanField::new('isVisible', 'Visible');
    }


}

<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        // setTargetFieldName() => Methode de slugField
        yield SlugField::new('slug')->setTargetFieldName('title');
        yield AssociationField::new('categories');
        yield TextareaField::new('content');
        // Faire Carousel d'image
        yield AssociationField::new('featuredImage');
            // ->setFormTypeOptions([
            //     'multiple' => true
            // ])
        yield TextField::new('dates');
        yield TextField::new('age');
        yield TextField::new('duration');
        yield NumberField::new('article_order', 'Ordre');
        yield TextField::new('featuredText');
        yield DateTimeField::new('createdAt')->hideOnForm();
        yield DateTimeField::new('updatedAt')->hideOnForm();
        yield BooleanField::new('isVisible', 'Visible');
    }
}

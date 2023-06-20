<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Repository\CategoyRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Quel est le nom de votre produit')
                ->setIcon('cube')->addCssClass('optional')
                ->setHelp('Saisissez un nom a votre produit'),
            TextField::new('name'),
            FormField::addPanel('Quel est le prix de votre produit')
                ->setIcon('euro')->addCssClass('optional')
                ->setHelp('Votre marge est importante'),
            IntegerField::new('price'),
            FormField::addPanel('Description court')
                ->setIcon('bullhorn')->addCssClass('optional')
                ->setHelp('Donnez envie d\'acheter '),
            TextareaField::new('short_description'),
            FormField::addPanel('Contact information')
                ->setIcon('bullhorn')->addCssClass('optional')
                ->setHelp(''),
            TextEditorField ::new('long_description'),
            FormField::addPanel('Categorie')
                ->setIcon('book')->addCssClass('optional')
                ->setHelp('l\'information c\est bien, mais captiver vos prospective c\'est mieux'),
           AssociationField::new('categoy')
           -> setCrudController(CategoyCrudController::class),
           FormField::addPanel('Un produit avec une image vend mieux !')
            ->setIcon('image')->addCssClass('optional')
            ->setHelp('Ajouter une image'),
            ImageField::new('image')->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setBasePath('image/products/')
            ->setUploadDir('public/image/products/'),
            FormField::addPanel('Mettre en avant')
                ->setIcon('star')
                ->setHelp('souhaitez vous mztre ce produit en avant'),
           BooleanField::new('isFeatured'),

           FormField::addPanel('Publier le produit')
           ->setIcon('eye')
           ->setHelp('Souhaiter-vous publier ce produit dans la boutique'),
      BooleanField::new('isPublished')

        ];
    }
}

           
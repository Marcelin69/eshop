<?php

namespace App\Controller\Admin;

use App\Entity\Categoy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categoy::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

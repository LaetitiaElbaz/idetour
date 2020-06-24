<?php

namespace App\Controller\Admin;

use App\Entity\Days;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Days::class;
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

<?php

namespace App\Controller\Admin;

use App\Entity\Audience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AudienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Audience::class;
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

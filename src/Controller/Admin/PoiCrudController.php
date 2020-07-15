<?php

namespace App\Controller\Admin;

use App\Entity\Poi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PoiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poi::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('poiName', 'Nom'),
            TextEditorField::new('description', "Description"),

            FormField::addPanel('Localisation'),
            TextField::new('address', "Adresse"),
            AssociationField::new('city', "Ville"),

            FormField::addPanel('Détails de l\'offre'),
            // TextEditorField::new('offers', "Offres"),

            FormField::addPanel('Informations contact'),
            // AssociationField::new('contacts', "Contacts")->setFormType(contactType::class),

            FormField::addPanel('Catégories'),
            AssociationField::new('categories', "Catégories"),
            AssociationField::new('tags', "Etiquettes"),
            AssociationField::new('reviews', "Labels"),
        ];
    }
    
}

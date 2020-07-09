<?php

namespace App\Controller\Admin;

use App\Entity\City;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return City::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('ville')
            ->setEntityLabelInPlural('villes')

            // the Symfony Security permission needed to manage the entity
            // (none by default, so you can manage all instances of the entity)
            // ->setEntityPermission('ROLE_EDITOR')

            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders: %entity_id%, %entity_label_singular%, %entity_label_plural%
            ->setPageTitle('index', 'Liste des %entity_label_plural% ')

            // the names of the Doctrine entity properties where the search is made on
            // (by default it looks for in all properties)
            ->setSearchFields(['cityCode', 'cityName', 'createdAt', 'updatedAt'])

            // defines the initial sorting applied to the list of entities
            // (user can later change this sorting by clicking on the table columns)
            ->setDefaultSort(['cityCode' => 'ASC'])

            // the max number of entities to display per page
            ->setPaginatorPageSize(20);
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('cityCode', 'Code postal'),
            TextField::new('cityName', 'Nom de la ville'),
            TextField::new('cityGpsLat', 'Latitude'),
            TextField::new('cityGpsLng', 'Longitude'),
            DateTimeField::new('createdAt')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->onlyOnDetail(),
            TextField::new('departmenSlug')->onlyOnDetail(),
        ];
    }
}

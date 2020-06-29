<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }

    // public function configureCrud(Crud $crud): Crud
    // {
    //     return $crud
    //         // the labels used to refer to this entity in titles, buttons, etc.
    //         ->setEntityLabelInSingular('Pays')
    //         ->setEntityLabelInPlural('Pays')

    //         // the Symfony Security permission needed to manage the entity
    //         // (none by default, so you can manage all instances of the entity)
    //         // ->setEntityPermission('ROLE_EDITOR')

    //         // the visible title at the top of the page and the content of the <title> element
    //         // it can include these placeholders: %entity_id%, %entity_label_singular%, %entity_label_plural%
    //         ->setPageTitle('index', '%entity_label_plural% listing')

    //         // the names of the Doctrine entity properties where the search is made on
    //         // (by default it looks for in all properties)
    //         ->setSearchFields(['id','countryCode', 'CountryName', 'createdAt','updatedAt'])

    //         // defines the initial sorting applied to the list of entities
    //         // (user can later change this sorting by clicking on the table columns)
    //         ->setDefaultSort(['id' => 'DESC', 'countryName' => 'ASC'])

    //         // the max number of entities to display per page
    //         ->setPaginatorPageSize(10)

    //         // this method allows to use your own template to render a certain part
    //         // of the backend instead of using EasyAdmin default template
    //         // the first argument is the "template name", which is the same as the
    //         // Twig path but without the `@EasyAdmin/` prefix
    //         ->overrideTemplate('crud/field/id', 'admin/fields/my_id.html.twig')
    //     ;
    // }
    
    // public function configureFields(string $pageName): iterable
    // {

    //     return [
    //         IdField::new('id')->hideOnForm(),
    //         TextField::new('countryCode'),
    //         TextField::new('countryName'),
    //         DateTimeField::new('createdAt')->onlyOnDetail(),
    //         DateTimeField::new('updatedAt')->onlyOnDetail(),
    //         TextField::new('countrySlug'),
    //     ];
    // }
    
}

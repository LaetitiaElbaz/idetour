<?php

namespace App\Controller\Admin;

use App\Entity\Area;
use App\Entity\Audience;
use App\Entity\Category;
use App\Entity\City;
use App\Entity\Comment;
use App\Entity\Contact;
use App\Entity\Country;
use App\Entity\Days;
use App\Entity\Department;
use App\Entity\Offer;
use App\Entity\Period;
use App\Entity\Poi;
use App\Entity\Price;
use App\Entity\Review;
use App\Entity\Role;
use App\Entity\Tag;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('IDtour');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            // MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),

            MenuItem::section('Centres d\'intérêt'),
            MenuItem::linkToCrud('Centres d\'intérêt', 'fa fa-map-marker', Poi::class)
            ->setController(Offer::class)
                ->setController(PriceCrudController::class)
                ->setController(ContactCrudController::class)
                ->setController(RoleCrudController::class)
                ->setQueryParameter('sortField', 'poiName'),


            MenuItem::section('Localisation'),
            MenuItem::linkToCrud('Pays', 'fa fa-globe', Country::class),
                // ->setAction('new'),
            MenuItem::linkToCrud('Régions', 'fa fa-globe', Area::class),
            MenuItem::linkToCrud('Départements', 'fa fa-globe', Department::class),
            MenuItem::linkToCrud('Villes', 'fa fa-globe', City::class),

            MenuItem::section('Public'),
            MenuItem::linkToCrud('Public', 'fa fa-users', Audience::class),

            MenuItem::section('Catégories'),
            MenuItem::linkToCrud('Catégories', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Labels', 'fa fa-tags', Review::class),
            MenuItem::linkToCrud('Etiquettes', 'fa fa-tags', Tag::class),

            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class),
            MenuItem::linkToCrud('Commentaires', 'fa fa-comment', Comment::class),
            MenuItem::linkToExitImpersonation('Arrêtez l\'emprunt d\'identité', 'fa fa-sign-out'),

            MenuItem::section('Périodes'),
            MenuItem::linkToCrud('Périodes', 'fa fa-calendar', Period::class),
            MenuItem::linkToCrud('Jours', 'fa fa-calendar', Days::class),
        ];

    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getUsername())
            // use this method if you don't want to display the user image
            ->displayUserAvatar(false)
            // you can also pass an email address to use gravatar's service
            // ->setGravatarEmail($user->getEmail())

            // you can use any type of menu item
            ->addMenuItems([
                MenuItem::linkToRoute('Mon profile', 'fa fa-id-card', '...', ['...' => '...']),
                MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                MenuItem::section(),
                MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out'),
            ]);
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            // the first argument is the "template name", which is the same as the
            // Twig path but without the `@EasyAdmin/` prefix

            ->overrideTemplates([
                'layout' => 'bundles/easyAdminBundle/default/layout.html.twig',
                // 'crud/field/textarea' => 'admin/fields/dynamic_textarea.html.twig',
            ])
        ;
    }

    public function configureAssets(): Assets
    {
        return Assets::new()

        // My custom CSS
        ->addCssFile('assets/css/admin.css')
        // HEAD : Bootstrap CSS CDN
        ->addHtmlContentToHead('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">')
        // HEAD : Font Awesome JS
        ->addHtmlContentToHead('<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">')
        ->addHtmlContentToHead('<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>')
        ->addHtmlContentToHead('<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>')
        
        // BODY : JQuery.js
        ->addHtmlContentToBody('<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>')
        // BODY : POppers.js
        ->addHtmlContentToBody('<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>');
        
    }


}

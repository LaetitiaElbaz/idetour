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

}

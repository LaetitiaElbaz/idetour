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
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

            MenuItem::section('Localisation'),
            MenuItem::linkToCrud('Pays', 'fa fa-globe', Country::class),
            MenuItem::linkToCrud('Régions', 'fa fa-globe', Area::class),
            MenuItem::linkToCrud('Départements', 'fa fa-globe', Department::class),
            MenuItem::linkToCrud('Villes', 'fa fa-globe', City::class),

            MenuItem::section('Centres d\'intérêt'),
            MenuItem::linkToCrud('Centres d\'intérêt', 'fa fa-map-marker', Poi::class),
            MenuItem::linkToCrud('Contacts', 'fa fa-address-book', Contact::class),
            MenuItem::linkToCrud('Rôles', 'fa fa-address-book', Role::class),

            MenuItem::section('Offres'),
            MenuItem::linkToCrud('Offres', 'fa fa-map-marker', Offer::class),
            MenuItem::linkToCrud('Public', 'fa fa-users', Audience::class),
            MenuItem::linkToCrud('Prix', 'fa fa-money', Price::class),

            MenuItem::section('Catégories'),
            MenuItem::linkToCrud('Catégories', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Labels', 'fa fa-tags', Review::class),
            MenuItem::linkToCrud('Etiquettes', 'fa fa-tags', Tag::class),

            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class),
            MenuItem::linkToCrud('Commentaires', 'fa fa-comment', Comment::class),

            MenuItem::section('Périodes'),
            MenuItem::linkToCrud('Périodes', 'fa fa-calendar', Period::class),
            MenuItem::linkToCrud('Jours', 'fa fa-calendar', Days::class),
        ];

    }
}

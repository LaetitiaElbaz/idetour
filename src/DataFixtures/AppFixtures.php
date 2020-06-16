<?php

namespace App\DataFixtures;

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

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create some Audience
        $toutPublic = new Audience;
        $toutPublic->setAgeGroup('Tout public');
        $manager->persist($toutPublic);

        $etudiant = new Audience;
        $etudiant->setAgeGroup('Etudiant');
        $manager->persist($etudiant);

        $enfant = new Audience;
        $enfant->setAgeGroup('Enfant');
        $manager->persist($enfant);

        $adulte = new Audience;
        $adulte->setAgeGroup('Adulte');
        $manager->persist($adulte);

        $senior = new Audience;
        $senior->setAgeGroup('Senior');
        $manager->persist($senior);

        // Create some days
        $lundi = new Days;
        $lundi->setDay('Lundi');
        $manager->persist($lundi);

        $mardi = new Days();
        $mardi->setDay('Mardi');
        $manager->persist($mardi);

        $mercredi = new Days();
        $mercredi->setDay('Mercredi');
        $manager->persist($mercredi);

        $jeudi = new Days();
        $jeudi->setDay('Jeudi');
        $manager->persist($jeudi);

        $vendredi = new Days();
        $vendredi->setDay('Vendredi');
        $manager->persist($vendredi);

        $samedi = new Days();
        $samedi->setDay('Samedi');
        $manager->persist($samedi);

        $dimanche = new Days();
        $dimanche->setDay('Dimanche');
        $manager->persist($dimanche);

        // Create some period
        $estivale = new Period();
        $estivale->setPeriodName('estivale');
        $estivale->setStartDate(new \DateTime(2020-06-15, new \DateTimeZone('UTC')));
        $estivale->setEndDate(new \DateTime(2020-20-30, new \DateTimeZone('UTC')));
        $estivale->setStartTime(new \DateTime(1000, new \DateTimeZone('UTC')));
        $estivale->setEndTime(new \DateTime(1900, new \DateTimeZone('UTC')));
        $estivale->addDay($lundi);
        $estivale->addDay($mardi);
        $estivale->addDay($mercredi);
        $estivale->addDay($jeudi);
        $estivale->addDay($vendredi);
        $estivale->addDay($samedi);
        $manager->persist($estivale);

        $hivernale = new Period();
        $hivernale->setPeriodName('hivernale');
        $hivernale->setStartDate(new \DateTime(2020-15-11, new \DateTimeZone('UTC')));
        $hivernale->setEndDate(new \DateTime(2020-06-15, new \DateTimeZone('UTC')));
        $hivernale->setStartTime(new \DateTime(1000, new \DateTimeZone('UTC')));
        $hivernale->setEndTime(new \DateTime(1800, new \DateTimeZone('UTC')));
        $hivernale->addDay($mardi);
        $hivernale->addDay($mercredi);
        $hivernale->addDay($jeudi);
        $hivernale->addDay($vendredi);
        $hivernale->addDay($samedi);
        $manager->persist($hivernale);

        // Create users
        $laetitia = new User();
        $laetitia->setUsername('laetitia');
        $laetitia->setEmail('laetitia@gmail.com');
        $laetitia->setPlainPassword('laetitia');
        $laetitia->setPassword('$argon2id$v=19$m=65536,t=4,p=1$DcNMf8+KR6z8EFUM88mZWg$7KE4rXK3q+3RHsVtuU98iH76pM8ZXn+nEbnsaq/WEvM');
        $laetitia->setUsernameRole(["ROLE_ADMIN"]);
        $manager->persist($laetitia);

        $fripouille = new User();
        $fripouille->setUsername('fripouille');
        $fripouille->setEmail('fripouille@gmail.com');
        $fripouille->setPlainPassword('fripouille');
        $fripouille->setPassword('$argon2id$v=19$m=65536,t=4,p=1$5f/t6kKP52Ta7SnL/ECZZA$0dx9LUbom1zmAXGeBM/y3YBQd27vhmCUBHul4f8tuE8');
        $fripouille->setUsernameRole(["ROLE_USER"]);
        $manager->persist($fripouille);

        $tortue = new User();
        $tortue->setUsername('tortue');
        $tortue->setEmail('tortue@gmail.com');
        $tortue->setPlainPassword('tortue');
        $tortue->setPassword('$argon2id$v=19$m=65536,t=4,p=1$rIIXAXW+zFT4Mfj7kBvAUA$bi1jNzU/U1Rc7Nv1NQnk5m6k7xrsk9J5CDHPqXdv7CQ');
        $tortue->setUsernameRole(["ROLE_USER"]);
        $manager->persist($tortue);

        // Create some tags
        $interieur = new Tag();
        $interieur->setTagName('interieur');
        $manager->persist($interieur);

        $exterieur = new Tag();
        $exterieur->setTagName('exterieur');
        $manager->persist($exterieur);

        $permanent = new Tag();
        $permanent->setTagName('permanent');
        $manager->persist($permanent);

        $saisonnier = new Tag();
        $saisonnier->setTagName('saisonnier');
        $manager->persist($saisonnier);

        // Create some categories
        $vue =  new Category();
        $vue->setCategoryName('vue');
        $manager->persist($vue);

        $odorat =  new Category();
        $odorat->setCategoryName('odorat');
        $manager->persist($odorat);

        $ouïe =  new Category();
        $ouïe->setCategoryName('ouïe');
        $manager->persist($ouïe);

        $toucher =  new Category();
        $toucher->setCategoryName('toucher');
        $manager->persist($toucher);

        $goût =  new Category();
        $goût->setCategoryName('goût');
        $manager->persist($goût);

        // Create some reviews
        $mof = new Review();
        $mof->setReviewName('MOF');
        $manager->persist($mof);

        $ateliersDArt = new Review();
        $ateliersDArt->setReviewName('Ateliers d\'art');
        $manager->persist($ateliersDArt);

        $jardinRemarquable = new Review();
        $jardinRemarquable->setReviewName('Jardin remarquable');
        $manager->persist($jardinRemarquable);

        $entreprisePatrimoineVivant = new Review();
        $entreprisePatrimoineVivant->setReviewName('Entreprise du patrimoine vivant');
        $manager->persist($entreprisePatrimoineVivant);

        // Create some Role of contact
        $booking = new Role();
        $booking->setRoleName('booking');
        $manager->persist($booking);

        $information = new Role();
        $information->setRoleName('information');
        $manager->persist($information);

        // Create some contact
        $contactPoi1 = new Contact();
        $contactPoi1->setFirstName('Jean Claude');
        $contactPoi1->setLastName('Dusse');
        $contactPoi1->setPhone(497055814);
        $contactPoi1->setEmail('activites.musees@paysdegrasse.fr');
        $contactPoi1->addRole($booking);
        $manager->persist($contactPoi1);

        $contactPoi2 = new Contact();
        $contactPoi1->setFirstName('Fernand');
        $contactPoi1->setLastName('Naudin');
        $contactPoi2->setPhone(675109170);
        $contactPoi2->setEmail('contact@yaplukapark.fr');
        $contactPoi2->addRole($information);
        $manager->persist($contactPoi2);

        // Create some POIs
        $poi1 = new Poi;
        $poi1->setPoiName('Yapluka park');
        $poi1->setDescription('En 2019, Yapluka Park fait sa mue ! Yapluka Park devient un parc de loisirs pour toute la famille, enfants, adultes, jeunes et moins jeunes avec une offre d’activités étoffée pour le plaisir du plus grand nombre.');
        $poi1->setAddress('2 Boulevard du Jeu de Ballon');
        $poi1->setpoiGpsLat('43.6667');
        $poi1->setpoiGpsLng('6.91667');
        $poi1->addReview($jardinRemarquable);
        // $poi1->addComment($commentPoi1Laetitia);
        // $poi1->addOffer($participation);
        $poi1->addTag($permanent);
        $poi1->addContact($contactPoi1);
        $poi1->addCategory($odorat);
        $manager->persist($poi1);

        $poi2 = new Poi;
        $poi2 -> setPoiName('Musée international de la parfumerie');
        $poi2 -> setDescription('Créé en 1989, Le Musée International de la Parfumerie, musée unique au monde, s’inscrit sur le territoire emblématique de la ville de Grasse, berceau de la parfumerie de luxe dont la France a été l’initiatrice. Dédié à l’une des activités traditionnelles françaises les plus prestigieuses, le Musée International de la Parfumerie, établissement public, labellisé « Musée de France », permet aux visiteurs de découvrir l’histoire et l’originalité du métier des industriels et des grandes Maisons de parfumerie. Véritable témoignage de l’histoire internationale technique, esthétique, sociale et culturelle de la tradition de l’usage des senteurs, le musée aborde par une approche anthropologique l’histoire des fragrances sous tous ses aspects -matières premières, fabrication, industrie, innovation, négoce, design, usages et à travers des formes très diverses- objets d’art, arts décoratifs, textiles, témoins archéologiques, pièces uniques ou formes industrielles.');
        $poi2->setAddress('Chemin du petit mont');
        $poi2->setpoiGpsLat('45.5936');
        $poi2->setpoiGpsLng('5.2952');
        $poi2->addTag($permanent);
        $poi2->addContact($contactPoi2);
        $poi2->addCategory($toucher);
        $manager->persist($poi2);

        // create some Cities
        $grasse = new City;
        $grasse->setCityCode('06130');
        $grasse->setCityName('Grasse');
        $grasse->setCityGpsLat('43.6478075');
        $grasse->setCityGpsLng('6.9316481');
        // $grasse->AddPoi($poi1);
        $manager->persist($grasse);

        $gourdon = new City;
        $gourdon->setCityCode('06620');
        $gourdon->setCityName('Gourdon');
        $gourdon->setCityGpsLat('43.724361988304');
        $gourdon->setCityGpsLng('6.9692666666667');
        $manager->persist($gourdon);

        $ruy = new City;
        $ruy->setCityCode('38300');
        $ruy->setCityName('Ruy-Montceau');
        $ruy->setCityGpsLat('45.589835266272');
        $ruy->setCityGpsLng('5.3449137278106');
        $ruy->AddPoi($poi2);
        $manager->persist($ruy);

        $stAndeol = new City;
        $stAndeol->setCityCode('38650');
        $stAndeol->setCityName('Saint-Andéol');
        $stAndeol->setCityGpsLat('44.951996707317');
        $stAndeol->setCityGpsLng('5.5494081707317');
        $manager->persist($stAndeol);

        // Create some departments
        $alpesDeHauteProvence = new Department();
        $alpesDeHauteProvence->setDepartmentName('Alpes-De-Haute-Provence');
        $alpesDeHauteProvence->setDepartmentCode(04);
        $manager->persist($alpesDeHauteProvence);

        $hautesAlpes = new Department();
        $hautesAlpes->setDepartmentName('Hautes-Alpes');
        $hautesAlpes->setDepartmentCode(05);
        $manager->persist($hautesAlpes);

        $alpesMaritimes = new Department();
        $alpesMaritimes->setDepartmentName('Alpes-Maritimes');
        $alpesMaritimes->setDepartmentCode(06);
        $alpesMaritimes->addCity($grasse);
        $alpesMaritimes->addCity($gourdon);
        $manager->persist($alpesMaritimes);

        $bouchesDuRhone = new Department();
        $bouchesDuRhone->setDepartmentName('Bouches-du-Rhône');
        $bouchesDuRhone->setDepartmentCode(13);
        $manager->persist($bouchesDuRhone);

        $var = new Department();
        $var->setDepartmentName('Var');
        $var->setDepartmentCode(04);
        $manager->persist($var);

        $vaucluse = new Department();
        $vaucluse->setDepartmentName('Vaucluse');
        $vaucluse->setDepartmentCode(04);
        $manager->persist($vaucluse);

        $ain = new Department();
        $ain->setDepartmentName('Ain');
        $ain->setDepartmentCode(01);
        $manager->persist($ain);

        $allier = new Department();
        $allier->setDepartmentName('Allier');
        $allier->setDepartmentCode(03);
        $manager->persist($allier);

        $ardeche = new Department();
        $ardeche->setDepartmentName('Ardèche');
        $ardeche->setDepartmentCode(07);
        $manager->persist($ardeche);

        $cantal = new Department();
        $cantal->setDepartmentName('Cantal');
        $cantal->setDepartmentCode(15);
        $manager->persist($cantal);

        $drome = new Department();
        $drome->setDepartmentName('Drôme');
        $drome->setDepartmentCode(26);
        $manager->persist($drome);
        
        $loire = new Department();
        $loire->setDepartmentName('Loire');
        $loire->setDepartmentCode(42);
        $manager->persist($loire);

        $hauteLoire = new Department();
        $hauteLoire->setDepartmentName('Haute-Loire');
        $hauteLoire->setDepartmentCode(43);
        $manager->persist($hauteLoire);

        $puyDeDome = new Department();
        $puyDeDome->setDepartmentName('Puy-De-Dome');
        $puyDeDome->setDepartmentCode(63);
        $manager->persist($puyDeDome);

        $rhone = new Department();
        $rhone->setDepartmentName('Rhône');
        $rhone->setDepartmentCode(69);
        $manager->persist($rhone);

        $savoie = new Department();
        $savoie->setDepartmentName('Savoie');
        $savoie->setDepartmentCode(73);
        $manager->persist($savoie);

        $hauteSavoie = new Department();
        $hauteSavoie->setDepartmentName('Haute-Savoie');
        $hauteSavoie->setDepartmentCode(74);
        $manager->persist($hauteSavoie);
        
        $isere = new Department();
        $isere->setDepartmentName('Isère');
        $isere->setDepartmentCode(38);
        $isere->addCity($ruy);
        $isere->addCity($stAndeol);
        $manager->persist($isere);

        // Create some areas
        $auvergneRhoneAlpes = new Area();
        $auvergneRhoneAlpes->setAreaCode(84);
        $auvergneRhoneAlpes->setAreaName('Auvergne-Rhône-Alpes');
        $auvergneRhoneAlpes->addDepartment($ain);
        $auvergneRhoneAlpes->addDepartment($allier);
        $auvergneRhoneAlpes->addDepartment($ardeche);
        $auvergneRhoneAlpes->addDepartment($cantal);
        $auvergneRhoneAlpes->addDepartment($drome);
        $auvergneRhoneAlpes->addDepartment($isere);
        $auvergneRhoneAlpes->addDepartment($loire);
        $auvergneRhoneAlpes->addDepartment($hauteLoire);
        $auvergneRhoneAlpes->addDepartment($puyDeDome);
        $auvergneRhoneAlpes->addDepartment($rhone);
        $auvergneRhoneAlpes->addDepartment($savoie);
        $auvergneRhoneAlpes->addDepartment($hauteSavoie);
        $manager->persist($auvergneRhoneAlpes);

        $bourgogneFrancheComte = new Area();
        $bourgogneFrancheComte->setAreaCode(27);
        $bourgogneFrancheComte->setAreaName('Bourgogne-Franche-Comté');
        $manager->persist($bourgogneFrancheComte);

        $bretagne = new Area();
        $bretagne->setAreaCode(53);
        $bretagne->setAreaName('Bretagne');
        $manager->persist($bretagne);

        $centreValDeLoire = new Area();
        $centreValDeLoire->setAreaCode(24);
        $centreValDeLoire->setAreaName('Centre-Val de Loire');
        $manager->persist($centreValDeLoire);

        $corse = new Area();
        $corse->setAreaCode(94);
        $corse->setAreaName('Corse');
        $manager->persist($corse);

        $grandEst = new Area();
        $grandEst->setAreaCode(44);
        $grandEst->setAreaName('Grand Est');
        $manager->persist($grandEst);

        $hautsDeFrance = new Area();
        $hautsDeFrance->setAreaCode(32);
        $hautsDeFrance->setAreaName('Hauts-de-France');
        $manager->persist($hautsDeFrance);

        $ileDeFrance = new Area();
        $ileDeFrance->setAreaCode(11);
        $ileDeFrance->setAreaName('Île-de-France');
        $manager->persist($ileDeFrance);

        $normandie = new Area();
        $normandie->setAreaCode(28);
        $normandie->setAreaName('Normandie');
        $manager->persist($normandie);

        $nouvelleAquitaine = new Area();
        $nouvelleAquitaine->setAreaCode(75);
        $nouvelleAquitaine->setAreaName('Nouvelle-Aquitaine');
        $manager->persist($nouvelleAquitaine);

        $occitanie = new Area();
        $occitanie->setAreaCode(76);
        $occitanie->setAreaName('Occitanie');
        $manager->persist($occitanie);

        $paysDeLaLoire = new Area();
        $paysDeLaLoire->setAreaCode(52);
        $paysDeLaLoire->setAreaName('Pays de la Loire');
        $manager->persist($paysDeLaLoire);

        $guadeloupe = new Area();
        $guadeloupe->setAreaCode(01);
        $guadeloupe->setAreaName('Guadeloupe');
        $manager->persist($guadeloupe);

        $martinique = new Area();
        $martinique->setAreaCode(02);
        $martinique->setAreaName('Martinique');
        $manager->persist($martinique);

        $guyane = new Area();
        $guyane->setAreaCode(03);
        $guyane->setAreaName('Guyane');
        $manager->persist($guyane);

        $paca = new Area();
        $paca->setAreaCode(93);
        $paca->setAreaName('Provence-Alpes-Côte d\'Azur');
        $paca->addDepartment($alpesDeHauteProvence);
        $paca->addDepartment($hautesAlpes);
        $paca->addDepartment($alpesMaritimes);
        $paca->addDepartment($bouchesDuRhone);
        $paca->addDepartment($var);
        $paca->addDepartment($vaucluse);
        $manager->persist($paca);

        $reunion = new Area();
        $reunion->setAreaCode(04);
        $reunion->setAreaName('La Réunion');
        $manager->persist($reunion);

        $mayotte = new Area();
        $mayotte->setAreaCode(06);
        $mayotte->setAreaName('Mayotte');
        $manager->persist($mayotte);

        $COM = new Area();
        $COM->setAreaCode('COM');
        $COM->setAreaName('Collectivités d\'Outre-Mer');
        $manager->persist($COM);

        // Create some countries
        $france = new Country;
        $france->setCountryName('France');
        $france->setCountryCode('FR');
        $france->addArea($auvergneRhoneAlpes);
        $france->addArea($bourgogneFrancheComte);
        $france->addArea($bretagne);
        $france->addArea($centreValDeLoire);
        $france->addArea($corse);
        $france->addArea($grandEst);
        $france->addArea($hautsDeFrance);
        $france->addArea($ileDeFrance);
        $france->addArea($normandie);
        $france->addArea($nouvelleAquitaine);
        $france->addArea($occitanie);
        $france->addArea($guadeloupe);
        $france->addArea($martinique);
        $france->addArea($guyane);
        $france->addArea($paca);
        $france->addArea($reunion);
        $france->addArea($mayotte);
        $france->addArea($COM);
        $manager->persist($france);

        $belgique = new Country;
        $belgique->setCountryName('Belgique');
        $belgique->setCountryCode('BE');
        $manager->persist($belgique);

        // create somme offers
        $visite = new Offer;
        $visite->setDescription('Visite du musée du parfum');
        $visite->setPoi($poi1);
        $visite->addPeriod($estivale);
        $visite->addPeriod($hivernale);
        $manager->persist($visite);

        $participation = new Offer;
        $participation->setDescription('Initiation à la création d\'un parfum');
        $participation->setPoi($poi1);
        $visite->addPeriod($estivale);
        $visite->addPeriod($hivernale);
        $manager->persist($participation);

        $parcours = new Offer();
        $parcours->setDescription('6 parcours enfants');
        $parcours->setPoi($poi2);
        $manager->persist($parcours);

        // Create some comments
        $commentPoi1Laetitia = new Comment();
        $commentPoi1Laetitia->setContent('Découvertes de plein de senteurs. Pas mal.');
        $commentPoi1Laetitia->setPicture('assets/images/Cracovie_Nov2007 021.1.jpg');
        $commentPoi1Laetitia->setRate(3);
        $commentPoi1Laetitia->setPoi($poi1);
        $commentPoi1Laetitia->setUser($laetitia);
        $manager->persist($commentPoi1Laetitia);

        $commentPoi2Tortue = new Comment();
        $commentPoi2Tortue->setContent('Les enfants ont adoré!');
        $commentPoi2Tortue->setPicture('assets/images/Cracovie_Nov2007 021.1.jpg');
        $commentPoi2Tortue->setRate(5);
        $commentPoi2Tortue->setPoi($poi2);
        $commentPoi2Tortue->setUser($tortue);
        $manager->persist($commentPoi2Tortue);

        // create some prices
        $visiteEnfantGratuit = new Price;
        $visiteEnfantGratuit->setPrice('00.00');
        $visiteEnfantGratuit->setOffer($visite);
        $visiteEnfantGratuit->setAudience($enfant);
        $manager->persist($visiteEnfantGratuit);

        $visiteAdultePleinTarif = new Price;
        $visiteAdultePleinTarif->setPrice('50.00');
        $visiteAdultePleinTarif->setOffer($visite);
        $visiteAdultePleinTarif->setAudience($adulte);
        $manager->persist($visiteAdultePleinTarif);

        $visiteEtudiantDemiTarif = new Price;
        $visiteEtudiantDemiTarif->setPrice('25.00');
        $visiteEtudiantDemiTarif->setOffer($visite);
        $visiteEtudiantDemiTarif->setAudience($etudiant);
        $manager->persist($visiteEtudiantDemiTarif);

        $participationEnfantGratuit = new Price;
        $participationEnfantGratuit->setPrice('00.00');
        $participationEnfantGratuit->setOffer($participation);
        $participationEnfantGratuit->setAudience($enfant);
        $manager->persist($participationEnfantGratuit);

        $participationSeniorDemiTarif = new Price;
        $participationSeniorDemiTarif->setPrice('47.50');
        $participationSeniorDemiTarif->setOffer($participation);
        $participationSeniorDemiTarif->setAudience($senior);
        $manager->persist($participationSeniorDemiTarif);

        $participationAdultePleinTarif = new Price;
        $participationAdultePleinTarif->setPrice('95');
        $participationAdultePleinTarif->setOffer($participation);
        $participationAdultePleinTarif->setAudience($adulte);
        $manager->persist($participationAdultePleinTarif);

        $manager->flush();
    }
}

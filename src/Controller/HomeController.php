<?php

namespace App\Controller;

use App\Entity\Poi;
use App\Form\HomeType;
use App\Repository\PoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function list(PoiRepository $poiRepository): Response
    {
        $form = $this->createForm(HomeType::class);
        return $this->render('home/list.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
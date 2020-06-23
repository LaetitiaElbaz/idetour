<?php

namespace App\Controller;

use App\Entity\Poi;
use App\Form\HomeType;
use App\Repository\PoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * List the Pois according to their localization
     * 
     * @Route("/" , name="homepage")
     * @param PoiRepository $poiRepository
     * @param Request $request
     * @return Response
     */
    public function list(Request $request, PoiRepository $poiRepository): Response
    {
        $poi = new poi();
        $form = $this->createForm(HomeType::class, $poi);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
        }

        return $this->render('home/list.html.twig', [
            'form' => $form->createView(),
            'pois' => $poiRepository->findAll(),

        ]);

    }
}
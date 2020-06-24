<?php

namespace App\Controller;

use App\Entity\Poi;
use App\Form\HomeType;
use App\Repository\PoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="home_")
 */
class HomeController extends AbstractController
{
    /**
     * List the Pois according to their localization
     * 
     * @Route("/" , name="list")
     * @param PoiRepository $poiRepository
     * @param Request $request
     * @return Response
     */
    public function list(Request $request, PoiRepository $repository): Response
    {
        // Create a new object Poi and a HomeType form associated that we fill with the request
        $pois = new poi();
        $form = $this->createForm(HomeType::class, $pois);
        $form->handleRequest($request);

        // if the form is submitted and validated : send the datas
        if ($form->isSubmitted() && $form->isValid()) {
            // If area AND department are null : return the list of all Poi in France
            if ($request->request->get('home')['area'] == null) {
                  if($request->request->get('home')['department'] == null) {
                    // Get the method in the repository
                    $pois = $repository->findAll();

                    // Return all pois
                    return $this->render('home/list.html.twig', [
                        'form' => $form->createView(),
                        'pois' => $pois
                    ]);
                  }

            // IF department is not null : return the list of Poi which match with department
            } elseif ($request->request->get('home')['department'] != null) {
                // Get and save department id
                $id = $request->request->get('home')['department'];
                // Get the method in the repository
                $pois = $repository->findAllByDepartment($id);

                return $this->render('home/list.html.twig', [
                    'form' => $form->createView(),
                    'pois' => $pois
                ]);

            // If area is null AND the department is not null : return the list of Poi which match with area
            } else {
                    // Get and save area id
                    $id = $request->request->get('home')['area'];
                    dump($id);
                    // Get the method in the repository
                    $pois = $repository->findAllByArea($id);

                    return $this->render('home/list.html.twig', [
                        'form' => $form->createView(),
                        'pois' => $pois
                    ]);


            }

        }

        return $this->render('home/list.html.twig', [
            'form' => $form->createView(),
            'pois' => $pois

        ]);
    }

}

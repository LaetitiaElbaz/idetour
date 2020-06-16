<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GitAddController extends AbstractController
{
    /**
     * @Route("/git/add", name="git_add")
     */
    public function index()
    {
        return $this->render('git_add/index.html.twig', [
            'controller_name' => 'GitAddController',
        ]);
    }
}

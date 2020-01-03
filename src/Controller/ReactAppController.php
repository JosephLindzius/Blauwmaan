<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReactAppController extends AbstractController
{
    /**
     * @Route("/reactApp", name="react_app")
     */
    public function index()
    {
        return $this->render('react_app/index.html.twig', [
            'controller_name' => 'ReactAppController',
        ]);
    }
}

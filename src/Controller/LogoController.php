<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LogoController extends AbstractController
{
    /**
     * @Route("/logo", name="logo")
     */
    public function index()
    {
        return $this->render('logo/index.html.twig', [
            'controller_name' => 'LogoController',
        ]);
    }
}

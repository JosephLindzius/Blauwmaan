<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoonController extends AbstractController
{
    /**
     * @Route("/moon", name="moon")
     */
    public function index()
    {

        return $this->render('moon/index.html.twig', [

        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BoxGameController extends AbstractController
{
    /**
     * @Route("/boxgame", name="box_game")
     */
    public function index()
    {
        return $this->render('box_game/index.html.twig', [
            'controller_name' => 'BoxGameController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChatBoxController extends AbstractController
{
    /**
     * @Route("/chatbox", name="chat_box")
     */
    public function index()
    {

        return $this->render('chat_box/index.html.twig', [
            'controller_name' => 'ChatBoxController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PartyMaker;

class RPGController extends AbstractController
{
    /**
     * @Route("/rpg", name="r_p_g")
     * @param PartyMaker $partyMaker
     * @return Response
     */
    public function index(PartyMaker $partyMaker)
    {
        $allies = $partyMaker->partyCreator(3);
        $enemies = $partyMaker->partyCreator(3);


        return $this->render('rpg/index.html.twig', [
            'allies' => $allies,
            'enemies' => $enemies,
        ]);
    }

}

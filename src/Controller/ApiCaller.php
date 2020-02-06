<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\APIPersonMaker;

class ApiCaller extends AbstractController
{
    /**
     * @Route("/apicaller", name="apicaller")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        $username = $this->createFormBuilder()
            ->add('Username', TextType::class, ['label' => 'Tell me your name'])
            ->add('Submit', SubmitType::class)
            ->getForm();

        $username->handleRequest($request);
        if ($username->isSubmitted() && $username->isValid()) {
            $api = new APIPersonMaker();
            $name = ($username->getData());
            return $this->render('apicaller/_apiCaller.html.twig', [
                'name' => $name['Username'],
                'api' => $api
            ]);
        }

        return $this->render('apicaller/index.html.twig', [
            'username' => $username->createView(),
        ]);
    }
}




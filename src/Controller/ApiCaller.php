<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiCaller extends AbstractController
{
    /**
     * @Route("/apicaller", name="apicaller")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {


        $_SESSION['user'] = null;
        $username = $this->createFormBuilder()
            ->add('Username', TextType::class, ['label' => 'Tell me your name'])
            ->add('Submit', SubmitType::class)
            ->getForm();

        if ($request && isset($username)) {
            $api = $this->apiCaller();
            $data = $username->handleRequest($request)->getData();

        }

        return $this->render('apicaller/index.html.twig', [
            'username' => $username->createView(),
            'name' => $data['Username'],
            'api' => $api
        ]);
    }

    private function apiCaller (): array
    {
        $client = new CurlHttpClient();
        try {
            $response = $client->request('GET', 'https://uinames.com/api/?ext');
        } catch (TransportExceptionInterface $e) {
            echo 'problem';
        }

        $statusCode = $response->getStatusCode();
// $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
// $contentType = 'application/json'
        $content = $response->getContent();
// $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
// $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        $_SESSION["ComputerAPI"] = $content;
        return $content;
    }

    /**
     * @Route("/apicallerOne", name="apicallerOne")
     * @param Request $request
     * @return Response
     */
    public function page1(Request $request) : Response
    {

        return $this->render('apicaller/index1.html.twig', [

        ]);
    }



}


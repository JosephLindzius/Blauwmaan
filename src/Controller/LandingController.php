<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class LandingController extends AbstractController
{
    /**
     * @Route("/landing", name="landing")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        $_SESSION['user'] = null;
        $username = $this->createFormBuilder()
            ->add('Username', TextType::class)
            ->add('Submit', SubmitType::class)
            ->getForm();

        if ($request) {
            $api = $this->apiCaller();
            $data = $username->handleRequest($request)->getData();
        }

        return $this->render('landing/index.html.twig', [
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

        return $content;
    }


}



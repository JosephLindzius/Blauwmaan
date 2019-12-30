<?php

namespace App\Controller;

use App\Entity\MessageEncode;
use App\Form\EncodeMessageType;
use App\Service\MessageClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatBoxController extends AbstractController
{

    /**
     * @Route("/chatbox", name="chat_box")
     * @param Request $request
     * @param MessageClient $messageClient
     * @return Response
     */
    public function index(Request $request, MessageClient $messageClient)
    {
        $em = $this->getDoctrine()->getManager();
        $messages = $em->getRepository(MessageEncode::class)->findAll();

        if (count($messages) > 5) {
            $message = $messages[0];
            $em->remove($message);
            $em->flush();
        }


        $form = $this->createForm(EncodeMessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData()['Message'];
            $messageEncode = $messageClient->messageEncode($message);
            $newMessage = new MessageEncode();
            $newMessage->setMessage($messageEncode);

            $em->persist($newMessage);
            $em->flush();
            $this->addFlash('success', 'Your message received '.$message);
            return $this->redirectToRoute('chat_box', [
                'messageEncode' => $messageEncode,
                'form' => $form->createView(),
                'messages' => $messages
            ]);
        }

        return $this->render('chat_box/index.html.twig', [
            'form' => $form->createView(),
             'messages' => $messages,
        ]);
    }

}

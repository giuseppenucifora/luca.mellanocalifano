<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contact_list")
     */
    public function listContacts(): Response
    {
        $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->render('test/list.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}

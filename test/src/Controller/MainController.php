<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Service\ContactService;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

class MainController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @Route("/", methods="GET", name="test_index")
     */
    public function index(Request $request){

        return $this->render('test/test.htm.twig');
    }

    /**
     * @param Request $request
     * @param ContactService $contactService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Route("/contact", methods="POST", name="test_contact")
     */
    public function contact(Request $request, ContactService $contactService){

        $name = $request->get('name');
        $email = $request->get('email');
        $message = $request->get('message');

        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setMessage($message);

        if($contactService->registerContact($contact)){
            return $this->redirect($this->generateUrl('testo_index'));
        }

        return $this->render('test/errore.html.twig');
    }
}
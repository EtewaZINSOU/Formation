<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contact controller.
 *
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/", name="contact")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->get('app.mailer.mailer')->sendContactMessage($form->getData());

            return $this->redirectToRoute('homepage');
        }

        return $this->render('contact/index.html.twig', array(
            'contact' => $form->createView(),
        ));
    }
}

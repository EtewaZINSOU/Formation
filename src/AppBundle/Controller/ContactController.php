<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/contact", name="homepage")
 * Class ContactController
 * @package AppBundle\Controller
 */
class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('components/contact.html.twig');
    }

}
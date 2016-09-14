<?php

namespace ProductBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 *
 * @package ProductBundle\Controller
 *
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/", name="product_home")
     */
    public function indexAction()
    {
        return $this->render('ProductBundle:Product:index.html.twig');
    }

    /**
     * @Route("/{id}", name="product_show")
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        return $this->render("ProductBundle:Product:show.html.twig", [
            'id' => $id
        ]);

    }
}

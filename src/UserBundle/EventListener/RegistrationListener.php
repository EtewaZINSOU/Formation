<?php

namespace UserBundle\EventListener;

use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationListener
{
    /** @var  UrlGeneratorInterface */
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }


    public function onSuccessRegistration(FormEvent $event)
    {

        $event->setResponse(
            new RedirectResponse($this->router->generate('homepage'))
        );

    }


}
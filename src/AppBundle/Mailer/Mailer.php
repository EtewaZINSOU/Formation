<?php

namespace AppBundle\Mailer;
use AppBundle\Entity\Contact;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Templating\EngineInterface;

class Mailer implements ContainerAwareInterface
{
    protected $mailer;

    protected $templating;
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Mailer constructor.
     * @param $mailer
     * @param $templating
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendContactMessage(Contact $contact)
    {
        $from = $contact->getEmail();
        $setTo = $this->container->getParameter('mailer_user');
        $subject = $contact->getSubject();
        $body = $contact->getBody();

        $this->sendMessage($from, $setTo, $subject, $body);
    }


    protected function sendMessage($from, $setTo, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();
        $mail
            ->setFrom($from)
            ->setTo($setTo)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }


    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
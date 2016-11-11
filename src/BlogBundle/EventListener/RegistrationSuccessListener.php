<?php

namespace BlogBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
// use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationSuccessListener implements EventSubscriberInterface
{
  private $router;

  public function __construct(UrlGeneratorInterface $router){
    $this->router = $router;
  }

  /**
     * {@inheritdoc}
  */
  public static function getSubscribedEvents()
  {
    return array(FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',);
  }

  public function onRegistrationSuccess(FormEvent $event)
  {
    $url = $this->router->generate('blog_homepage');
    $event->setResponse(new RedirectResponse($url));
  }
}

<?php

namespace App\EventSubscriber;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Cookie;

use App\Controller\AppController;
use App\Entity\User;
use App\Service\EventLogger;


class LocaleSubscriber implements EventSubscriberInterface
{

    private $logger;

    public function __construct(EventLogger $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $this->logger->logEvent($this, KernelEvents::CONTROLLER);

        $controller = $event->getController();
        $request = $event->getRequest();

        if (!is_array($controller)) {
            return;
        }

        $locale = $request->attributes->get('_locale');

        if (is_null($locale)) {
            $locale = $request->cookies->get('locale');
        }

        if (is_null($locale)) {
            $locale = "en";
        }

        $request->attributes->set('_locale', $locale);

        /*
        $controller = $controller[0];

        if ($controller instanceof AppController) {
            $current_user = $request->getSession()->get('user');
            if (!is_null($current_user)) {
                if ($locale != $current_user->getLocale()) {
                    $doctrine = $controller->get_doctrine();
                    $em = $doctrine->getManager();

                    $user = $doctrine->getRepository(User::class)
                        ->find($current_user->getId());

                    if (!is_null($user)) {
                        $user->setLocale($locale);
                        $em->flush();
                    }
                }
            }
        }
         */
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $this->logger->logEvent($this, KernelEvents::RESPONSE);

        $request = $event->getRequest();
        $response = $event->getResponse();

        $locale = $request->attributes->get('_locale');

        $response->headers->setCookie(new Cookie('locale', $locale));
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => 'onKernelController',
            KernelEvents::RESPONSE => 'onKernelResponse'
        );
    }

}

<?php

namespace App\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Psr\Log\LoggerInterface;


class EventLogger
{

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logEvent(EventSubscriberInterface $subscriber, String $event_name)
    {
        $this->logger->info(get_class($subscriber) . ' capturing event ' . $event_name);
    }

}

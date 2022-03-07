<?php

declare(strict_types=1);

namespace RabbitEvents\Listener\Events;

use RabbitEvents\Listener\Message\Handler;

class ListenerHandling
{
    public function __construct(public Handler $handler)
    {
    }
}
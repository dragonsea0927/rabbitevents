<?php

namespace Nuwber\Events\Tests\Queue;

use Nuwber\Events\Queue\NameResolver;
use PHPUnit\Framework\TestCase;

class NameResolverTest extends TestCase
{
    private $event = 'item.created';

    private $serviceName = 'test-app';

    /** @var \Nuwber\Events\Queue\NameResolver */
    private $resolver;

    public function setUp(): void
    {
        $this->resolver = new NameResolver($this->event, $this->serviceName);
    }

    public function testQueue()
    {
        $this->assertEquals("{$this->serviceName}:{$this->event}", $this->resolver->queue());
    }

    public function testBind()
    {
        $this->assertEquals($this->event, $this->resolver->bind());
    }
}

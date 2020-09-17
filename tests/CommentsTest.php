<?php

declare(strict_types=1);

namespace Goodhands\Comments\Test;

use Goodhands\Comments\Comments;

class CommentsTest extends TestCase
{
    public function testGetHello()
    {
        $object = \Mockery::mock(Comments::class);
        $object->shouldReceive('getHello')->passthru();

        $this->assertSame('Hello, World!', $object->getHello());
    }
}

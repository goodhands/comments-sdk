<?php

declare(strict_types=1);

namespace Goodhands\Comments\Test;

use Goodhands\Comments\Comments;
use Goodhands\Comments\Test\Stubs\Comment as CommentsStub;

class CommentsTest extends TestCase
{
    use CommentsStub;

    protected $comments;

    public function setUp(): void
    {
        $this->comments = \Mockery::mock(Comments::class);
    }

    public function testGetHello()
    {
        $object = \Mockery::mock(Comments::class);
        $object->shouldReceive('getHello')->passthru();

        $this->assertSame('Hello, World!', $object->getHello());
    }

    public function testCreateComment()
    {
        $this->comments->shouldReceive('create')
            ->with($this->createCommentPayload())
            ->andReturnSelf();

        $this->comments->shouldReceive('getResponse')
            ->andReturn($this->createCommentResponse());

        $result = $this->comments->create($this->createCommentPayload())->getResponse();

        $this->assertObjectHasAttribute('refId', $result);
        $this->assertObjectHasAttribute('ownerId', $result);
        $this->assertObjectHasAttribute('content', $result);
        $this->assertObjectHasAttribute('origin', $result);
    }

    public function testFetchAllComments()
    {
        $this->comments->shouldReceive('fetch')
            ->with($this->getAllCommentsPayload())
            ->andReturnSelf();

        $this->comments->shouldReceive('getResponse')
            ->andReturn($this->getAllCommentsResponse());

        $result = $this->comments->create($this->getAllCommentsPayload())->getResponse();

        $this->assertObjectHasAttribute('status', $result);
        $this->assertSame('success', $result->status);
        $this->assertObjectHasAttribute('message', $result);
        $this->assertObjectHasAttribute('data', $result);
        $this->assertObjectHasAttribute('records', $result->data);
        $this->assertObjectHasAttribute('pageInfo', $result->data);
    }

    public function testFetchSingleComment()
    {
        $this->comments->shouldReceive('single')
            ->with($this->getSingleCommentPayload())
            ->andReturnSelf();

        $this->comments->shouldReceive('getResponse')
            ->andReturn($this->getSingleCommentResponse());

        $result = $this->comments->single($this->getSingleCommentPayload())->getResponse();

        $this->assertObjectHasAttribute('message', $result);
        $this->assertObjectHasAttribute('status', $result);
    }
}

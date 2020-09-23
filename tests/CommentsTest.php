<?php

/**
 * This file is part of the goodhands/comments-sdk library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Samuel Olaegbe <olaegbesamuel@gmail.com>
 * @license   http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Goodhands\Comments\Test;

use Goodhands\Comments\Comments;
use Goodhands\Comments\Test\Stubs\Comment as CommentsStub;
use GuzzleHttp\Exception\GuzzleException;

class CommentsTest extends TestCase
{
    use CommentsStub;

    protected $comments;

    public function setUp(): void
    {
        $this->comments = \Mockery::mock(Comments::class);
    }

    public function testBaseUrlIsCorrect()
    {
        $baseUrl = Comments::BASE_URL;
        $this->assertSame('https://comment.microapi.dev/v1/', $baseUrl);
    }

    public function testCreateComment()
    {
        $this->comments->shouldReceive('create')
            ->with($this->createCommentPayload())
            ->andReturnSelf();

        $this->comments->shouldReceive('getResponse')
            ->andReturn($this->createCommentResponse());

        $result = $this->comments->create($this->createCommentPayload())->getResponse();

        $this->assertObjectHasAttribute('refId', $result->data);
        $this->assertObjectHasAttribute('ownerId', $result->data);
        $this->assertObjectHasAttribute('content', $result->data);
        $this->assertObjectHasAttribute('origin', $result->data);
    }

    public function testCreateCommentWithoutPayload()
    {
        $this->comments->shouldReceive('create')
            ->andReturnSelf();


    }

    public function testFetchAllComments()
    {
        $this->comments->shouldReceive('fetch')
            ->with($this->getAllCommentsPayload())
            ->andReturnSelf();

        $this->comments->shouldReceive('getResponse')
            ->andReturn($this->getAllCommentsResponse());

        $result = $this->comments->fetch($this->getAllCommentsPayload())->getResponse();

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

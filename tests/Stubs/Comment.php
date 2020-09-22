<?php

namespace Goodhands\Comments\Test\Stubs;

/**
 * Trait Comment
 *
 * @package Goodhands\Comments\Test\Stubs
 * @link    https://github.com/goodhands/comments-sdk/blob/master/tests/Stubs/Comment.php
 */
trait Comment
{
    /**
     * Provide a stub payload for creating
     * a new comment
     *
     * @return array
     * @link   https://github.com/goodhands/comments-sdk/blob/master/tests/Stubs/Comment.php#L16
     */
    public function createCommentPayload(): array
    {
        return [
            "refId" => "5f69bf79e787f",
            "ownerId" => "user-2",
            "content" => "I couldn't have done this without you",
            "origin" => "posts-21"
        ];
    }

    /**
     * Provide a stub expected response object
     * from fetching all comments
     *
     * @return object
     */
    public function createCommentResponse(): object
    {
        $response = new \stdClass();
        $response->status = "success";

        $response->data = new \stdClass();

        $response->data->commentId = uniqid();
        $response->data->refId = uniqid();
        $response->data->ownerId = "user-2";
        $response->data->content = "I couldn't have done this without you";
        $response->data->origin = "posts-21";
        $response->data->numOfVotes = 0;
        $response->data->numOfUpVotes = 0;
        $response->data->numOfDownVotes = 0;
        $response->data->numOfFlags = 0;
        $response->data->numOfReplies = 0;
        $response->data->createdAt = time();
        $response->data->updatedAt = time();

        return $response;
    }

    public function getAllCommentsPayload(): array
    {
        return [
            "isFlagged" => false,
            "refId" => "",
            "ownerId" => "",
            "origin" => "posts-21",
            "limit" => "",
            "sort" => "",
            "page" => ""
        ];
    }

    public function getAllCommentsResponse(): object
    {
        $response = new \stdClass();

        $response->message = "I couldn't have done this without you";
        $response->status = "success";

        $response->data = new \stdClass();

        $response->data->records = array(
            "commentId" => uniqid(),
            "refId" => uniqid(),
            "ownerId" => "user-4",
            "content" => "I couldn't have done this without you",
            "origin" => "posts-24",
            "numOfVotes" => 0,
            "numOfUpVotes" => 0,
            "numOfDownVotes" => 0,
            "numOfFlags" => 0,
            "numOfReplies" => 0,
            "createdAt" => "string",
            "updatedAt" => "string"
        );

        $response->data->pageInfo = array(
            "currentPage" => 0,
            "totalPages" => 0,
            "hasNext" => true,
            "hasPrev" => true,
            "nextPage" => 0,
            "prevPage" => 0,
            "pageRecordCount" => 0,
            "totalRecord" => 0
        );

        return $response;
    }

    public function getSingleCommentPayload(): string
    {
        return '5f66576ad02a34001bb8af0b';
    }

    public function getSingleCommentResponse(): object
    {
        $response = $this->createCommentResponse();
        $response->message = "Comment Retrieved Successfully";

        return $response;
    }
}

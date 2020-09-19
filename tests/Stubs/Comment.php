<?php

namespace Goodhands\Comments\Test\Stubs;

trait Comment
{
    /**
     * Provide a stub payload for creating
     * a new comment
     * @return array
     * @link https://github.com/goodhands/comment-sdk/tree/master/Comment.php
     */
    public function createCommentPayload(): array
    {
        return [
            "refId" => uniqid(),
            "ownerId" => "user-2",
            "content" => "I couldn't have done this without you",
            "origin" => "posts-21"
        ];
    }

    /**
     * Provide a stub expected response object
     * from fetching all comments
     * @return object
     */
    public function createCommentResponse(): object
    {
        $response = new \stdClass();

        $response->message = "I couldn't have done this without you";
        $response->status = "success";

        $response->data->records = array(
            "commentId" => "string",
            "refId" => "string",
            "ownerId" => "string",
            "content" => "string",
            "origin" => "string",
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
}

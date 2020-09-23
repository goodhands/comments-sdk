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

namespace Goodhands\Comments;

use Goodhands\Comments\Exceptions\CommentsException;

/**
 * A simple PHP library to use the comments microservice at https://comments.microapi.dev
 */
class Comments
{
    private const BASE_URL = "https://comment.microapi.dev/v1/";

    private Client $http;

    private $response;

    public function __construct($ACCESS_TOKEN)
    {
        $this->http = new Client([
            'base_uri' => self::BASE_URL,
            'headers' => [
                'Authorization' => 'Bearer ' . $ACCESS_TOKEN
            ]
        ]);
    }

    /**
     * Create a new comment resource
     * @param Array $payload
     * @throws GuzzleException
     * @return Comments
     */
    public function create($payload)
    {
        if (!in_array(['refId', 'ownerId', 'content', 'origin'], $payload)) {
            throw new CommentsException("Required arguments for payload are refId, ownerId, content, origin");
        }

        try {
            $this->response = $this->http->post('/comments', [
                "body" => [
                    json_encode($payload)
                ]
            ]);

            return $this;
        } catch (GuzzleException $ge) {
            throw $ge;
        }
    }

    /**
     * Get response for all requests
     * @return mixed $response
     */
    public function getResponse()
    {
        return json_decode($this->response->getBody());
    }
}

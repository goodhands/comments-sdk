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

namespace Goodhands\Comments\Traits;

use Goodhands\Comments\HTTP\Http;
use GuzzleHttp\Exception\GuzzleException;

trait Votes
{

    public function http()
    {
        return new Http([
            'base_uri' => self::BASE_URL,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->ACCESS_TOKEN,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * Handle all vote actions
     * @param string $type
     * @param string $ownerId
     * @param string $commentId
     * @return Http
     * @throws GuzzleException
     */
    public function vote(string $type, string $ownerId, string $commentId)
    {
        $http = $this->http();

        $http->patch('comments/' . $commentId . '/votes/' . $type, [
            "body" => json_encode([
                "ownerId" => $ownerId
            ])
        ]);

        return $http;
    }

    /**
     * Upvote a comment
     * @param string $commentId
     * @param string $ownerId
     * @throws GuzzleException
     * @return Http
     */
    public function upvote(string $commentId, string $ownerId)
    {
        return $this->vote('upvote', $ownerId, $commentId);
    }

    /**
     * Downvote a comment
     * @param string $commentId
     * @param string $ownerId
     * @return Http
     * @throws GuzzleException
     */
    public function downvote(string $commentId, string $ownerId)
    {
        return $this->vote('downvote', $ownerId, $commentId);
    }
}

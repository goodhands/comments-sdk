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

namespace Goodhands\Comments\HTTP;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Http
{

    private Client $http;

    public function __construct($setup)
    {
        $this->http = new Client($setup);
    }

    /**
     * Create a post request to the given URI
     * @param $uri
     * @param $payload
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post($uri, $payload)
    {
        try {
            return $this->http->post($uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}

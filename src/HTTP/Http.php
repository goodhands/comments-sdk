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
    public ResponseInterface $response;

    public function __construct($setup)
    {
        $this->http = new Client($setup);
    }

    /**
     * Create a post request to the given endpoint
     * @param string $uri
     * @param array $payload
     * @throws GuzzleException
     */
    public function post($uri, $payload)
    {
        try {
            $this->response = $this->http->post($uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Create a get request to the given endpoint
     * @param string $uri
     * @param array $payload
     * @return void
     * @throws GuzzleException
     */
    public function get($uri, $payload = [])
    {
        try {
            $this->response = $this->http->get($uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Create a patch request to the given endpoint
     * @param string $uri
     * @param array $payload
     * @throws GuzzleException
     */
    public function patch($uri, $payload)
    {
        try {
            $this->response = $this->http->patch($uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Delete a resource
     * @param $uri
     * @throws GuzzleException
     */
    public function delete($uri)
    {
        try {
            $this->response = $this->http->delete($uri);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Provide response in formatted array
     * @return mixed
     */
    public function getResponse()
    {
        return json_decode($this->response->getBody()->getContents(), true, JSON_PRETTY_PRINT);
    }
}

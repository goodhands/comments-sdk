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

/**
 * A simple PHP library to use the comments microservice at https://comments.microapi.dev
 */
class Comments
{
    /**
     * Returns a simple and friendly message.
     *
     * @return string
     */
    public function getHello(): string
    {
        return 'Hello, World!';
    }
}

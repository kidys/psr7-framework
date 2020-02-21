<?php
namespace App\Framework\Http;

/**
 *
 * Class Request
 */
class Request
{
    /**
     * Get array $_GET
     *
     * @return array
     */
    public function getQueriesParams() : array
    {
        return $_GET;
    }

    /**
     * Get request of the methods POST, PUT, PATCH & DELETE
     *
     * @return array|null
     */
    public function getParsedBody() : ?array
    {
        return $_POST ?: null;
    }
}
<?php
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
     * Get array $_COOKIE
     *
     * @return array
     */
    public function getCookiesData() : array
    {
        return $_COOKIE;
    }

    /**
     * Get array $_SESSION
     *
     * @return array
     */
    public function getSessionsData() : array
    {
        return $_SESSION;
    }

    /**
     * Get array $_SERVER
     * @return array
     */
    public function getServersData() : array
    {
        return $_SERVER;
    }
}
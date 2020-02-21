<?php
session_start();
chdir(dirname(__DIR__));

## Initializing the application

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

/**
 * The function of determining the language of the client
 *
 * @param Request $request
 * @param string $default
 * @return string
 */
function getLang(Request $request, string $default = 'en') : string {
    if (!empty($request->getQueriesParams()['lang'])) return $request->getQueriesParams()['lang'];
    else if (!empty($request->getCookiesData()['lang'])) return $request->getCookiesData()['lang'];
    else if (!empty($request->getSessionsData()['lang'])) return $request->getSessionsData()['lang'];
    else if (!empty($request->getServersData()['HTTP_ACCEPT_LANGUAGE']))
        return substr($request->getServersData()['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    else return $default;
}

## Running the application

$lang = getLang(new Request());
$name = $_GET['name'] ?: 'Guest';
echo 'Hello, ' . $name . '! Your lang is "' . $lang . '"';
<?php
session_start();
chdir(dirname(__DIR__));

## Initializing the application

require_once __DIR__ . '/sources/Framework/Http/Request.php';

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
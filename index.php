<?php
session_start();
chdir(dirname(__DIR__));

## Initializing the application

/**
 * The function of determining the language of the client
 *
 * @param array $request
 * @param string $default
 * @return string
 */
function getLang(array $request, string $default = 'en') : string {
    if (!empty($request['get']['lang'])) return $request['get']['lang'];
    else if (!empty($request['cookie']['lang'])) return $request['cookie']['lang'];
    else if (!empty($request['session']['lang'])) return $request['session']['lang'];
    else if (!empty($request['server']['HTTP_ACCEPT_LANGUAGE']))
        return substr($request['server']['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    else return $default;
}

## Running the application

$request = [
    'get' => $_GET,
    'cookie' => $_COOKIE,
    'session' => $_SESSION,
    'server' => $_SERVER
];

$lang = getLang($request);
$name = $_GET['name'] ?: 'Guest';
echo 'Hello, ' . $name . '! Your lang is "' . $lang . '"';
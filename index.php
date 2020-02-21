<?php
session_start();
chdir(dirname(__DIR__));

## Initializing the application

/**
 * The function of determining the language of the client
 *
 * @param $get
 * @param $cookie
 * @param $session
 * @param $server
 * @param string $default
 * @return string
 */
function getLang($get, $cookie, $session, $server, string $default = 'en') : string {
    if (!empty($get['lang'])) return $get['lang'];
    else if (!empty($cookie['lang'])) return $cookie['lang'];
    else if (!empty($session['lang'])) return $session['lang'];
    else if (!empty($server['HTTP_ACCEPT_LANGUAGE']))
        return substr($server['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    else return $default;
}

## Running the application

$lang = getLang($_GET, $_COOKIE, $_SESSION, $_SERVER);
$name = $_GET['name'] ?: 'Guest';
echo 'Hello, ' . $name . '! Your lang is "' . $lang . '"';
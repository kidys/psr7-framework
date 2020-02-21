<?php
session_start();
chdir(dirname(__DIR__));

## Initializing the application

/**
 * The function of determining the language of the client
 *
 * @param string $default
 * @return string
 */
function getLang($default = 'en') : string {
    if (!empty($_GET['lang'])) return $_GET['lang'];
    else if (!empty($_COOKIE['lang'])) return $_COOKIE['lang'];
    else if (!empty($_SESSION['lang'])) return $_SESSION['lang'];
    else if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    else return $default;
}

## Running the application

$lang = getLang();
$name = $_GET['name'] ?: 'Guest';
echo 'Hello, ' . $name . '! Your lang is "' . $lang . '"';
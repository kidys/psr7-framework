<?php
session_start();
chdir(dirname(__DIR__));

use App\Framework\Http\Request;

## Initializing the application

require_once __DIR__ . '/vendor/autoload.php';

$request = new Request();

## Running the application

$name = $request->getQueriesParams()['name'] ?: 'Guest';
echo 'Hello, ' . $name;
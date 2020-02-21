<?php
$name = $_GET['name'] ?: 'Guest';
header('X-Developer: Denis Kitaev');
echo 'Hello, ' . $name;
<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../..");
$dotenv->load();


define('URL', $_ENV['URL']);

define('HOST', $_ENV['HOST']);
define('DB', $_ENV['DB']);
define('USER', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWORD']);
define('CHARSET', $_ENV['CHARSET']);


<?php

require_once "../../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../..");
$dotenv->load();

session_start();
session_unset();
session_destroy();
header("location: " . $_ENV['URL']);

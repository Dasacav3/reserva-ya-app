<?php

include __DIR__ . '/../config/config.php';

session_start();
session_unset();
session_destroy();

header("location: " . constant('URL'));

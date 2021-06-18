<?php

    session_start();
    session_unset();
    session_destroy();
    header("location: http://34.67.243.191/login");

<?php

    session_start();
    session_unset();
    session_destroy();
    header("location: http://192.168.213.129/login");

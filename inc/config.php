<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'course';

    //create database connection
    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    

    define("ROOT_PATH", "/simple-course-app/");
    define("ROOT_URL", "/simple-course-app/");
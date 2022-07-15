<?php


    $host = '3.0.56.213';
    $user = 'fortest';
    $pass = 'Pa55w0rd';
    $db = 'shoppingdb';
    $port = '3306';

    $mysqli = mysqli_connect($host, $user, $pass, $db)
                or die('Tidak dapat connect ke database');
?>
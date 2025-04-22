<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'php_crud_new';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die('connection failed' . mysqli_connect_error());
}

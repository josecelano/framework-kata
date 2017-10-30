<?php

$db_hostname = 'localhost';
$db_port = 3306;
$db_username = 'root';
$db_password = '123';
$db_database = 'framework_kata';

// Database Connection String
$con = mysql_connect($db_hostname, $db_username, $db_password);
if (!$con) {
    die('Could not connect: ' . mysql_error());
} else {
    echo "Database OK\n";
}

mysql_select_db($db_database, $con);
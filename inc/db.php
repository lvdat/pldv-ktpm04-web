<?php

$db_host = 'localhost';
$db_name = 'ktpm';
$db_user = 'root';
$db_password = '';
$db_port = '3306';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
mysqli_set_charset($conn, 'UTF8');
if(!$conn){
    echo 'KET NOI CSDL LOI!'; exit();
}

session_start();
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load($_SERVER['DOCUMENT_ROOT'] . '/.env');

$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_password = $_ENV['DB_PASSWORD'];
$db_port = $_ENV['DB_PORT'];

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
mysqli_set_charset($conn, 'UTF8');
if(!$conn){
    echo 'KET NOI CSDL LOI!'; 
    header('Location: /401.php');
    exit();
}

session_start();
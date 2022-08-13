ERROR WHEN CONNECT TO DATABASE.
<?php
require 'vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

echo $_ENV['DB_HOST'];
echo $_ENV['DB_NAME'];
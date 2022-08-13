<?php
require 'inc/load.php';

if(checkLogin()) {
    unset($_SESSION['user']);
}
if(isset($_COOKIE['hash'])){
    setcookie('hash', '', time() - (86400 * 30), "/");
}

header('Location: /');
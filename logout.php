<?php
require 'inc/load.php';

if(checkLogin()) {
    // reset hash
    updateHash($_SESSION['user']);
    unset($_SESSION['user']);
}
if(isset($_COOKIE['hash'])){
    setcookie('hash', '', time() - (86400 * 30), "/");
}

header('Location: /');
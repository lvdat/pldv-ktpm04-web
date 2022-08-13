<?php
require 'inc/load.php';

if(checkLogin()) {
    unset($_SESSION['user']);
}

header('Location: /');
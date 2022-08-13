<?php
require 'includes/header.php';

if(checkLogin()) {
    header('Location: /');
    exit();
}
if(isset($_GET['hash'])) {
    $hash = $_GET['hash'];
    if(checkUserExist($hash)) {
        $render = getInfoUserByHash($hash);
        $_SESSION['user'] = $render['code'];
        require 'views/loginSuccess.php';
    } else {
        include 'views/hashNotValid.php';
    }
} else {
    header('Location: /');
}
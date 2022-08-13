<?php
require_once 'db.php';

function str_random($len) {
    $str = '';
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen( $chars );
    for( $i = 0; $i < $len; $i++ ) {
    $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}
function addUser($data) {
    global $conn;
    $code = $data['code'];
    $name = $data['name'];
    $email = $data['email'];
    $dtb1 = $data['dtb1'];
    $dtb2 = $data['dtb2'];
    $dtb = $data['dtb'];
    $drl1 = $data['drl1'];
    $drl2 = $data['drl2'];
    $drl = $data['drl'];
    $hash = $data['hash'];
    $sdt = $data['sdt'];
    $xeploai = $data['xeploai'];
    $sql = "INSERT INTO users (code, name, email, dtb1, dtb2, dtb, drl1, drl2, drl, hash, sdt, xeploai) VALUES ('$code', '$name', '$email', '$dtb1', '$dtb2', '$dtb', '$drl1', '$drl2', '$drl', '$hash', '$sdt', '$xeploai')";
    return $conn->query($sql);
}

function getInfoCurrentUser () {
    global $conn;
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE code = '$user'";
    return $conn->query($sql)->fetch_assoc();
}

function getInfoUserByHash ($hash) {
    global $conn;
    $sql = "SELECT * FROM users WHERE hash = '$hash'";
    return $conn->query($sql)->fetch_assoc();
}

function checkUserExist ($hash) {
    global $conn;
    $sql = "SELECT * FROM users WHERE hash = '$hash'";
    return $conn->query($sql)->num_rows > 0;
}

function checkLogin () {
    if((!isset($_SESSION['user']) && !isset($_COOKIE['hash'])) || !isset($_COOKIE['hash'])) {
        return false;
    } elseif(isset($_COOKIE['hash']) && !isset($_SESSION['user'])) {
        $hash = $_COOKIE['hash'];
        if(checkUserExist($hash)) {
            $render = getInfoUserByHash($hash);
            $_SESSION['user'] = $render['code'];
            return true;
        } else {
            setcookie('hash', '', time() - (86400 * 30), "/");
            return false;
        }
    }  else {
        global $conn;
        $user = $_SESSION['user'];
        $hash = $_COOKIE['hash'];
        $sql = "SELECT * FROM users WHERE code = '$user' AND hash = '$hash'";
        return $conn->query($sql)->num_rows > 0;
    }
}
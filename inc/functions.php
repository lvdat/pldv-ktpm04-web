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

function getInfoUserByCode ($code) {
    global $conn;
    $sql = "SELECT * FROM users WHERE code = '$code'";
    return $conn->query($sql)->fetch_assoc();
}

function checkUserExist ($hash) {
    global $conn;
    $sql = "SELECT * FROM users WHERE hash = '$hash'";
    return $conn->query($sql)->num_rows > 0;
}

function checkUserExistByEmail ($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return $conn->query($sql)->num_rows > 0;
}

function getInfoUserByEmail ($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return $conn->query($sql)->fetch_assoc();
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

function getVoteData () {
    global $conn;
    $sql = "SELECT code, info, upvote, downvote FROM dvut";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getVoteDataResult () {
    global $conn;
    $sql = "SELECT * FROM dvut";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getAllVoteData ($code) {
    global $conn;
    $sql = "SELECT * FROM dvut WHERE code = '$code'";
    return $conn->query($sql)->fetch_assoc();
}

function isVoted () {
    return getInfoCurrentUser()['voted'] == 1;
}

function upVote ($code) {
    global $conn;
    $currentVote = getAllVoteData($code)['upvote'];
    $newVote = $currentVote + 1;
    $sql = "UPDATE dvut SET upvote = '$newVote' WHERE code = '$code'";
    return $conn->query($sql);
}

function downVote ($code) {
    global $conn;
    $currentVote = getAllVoteData($code)['downvote'];
    $newVote = $currentVote + 1;
    $sql = "UPDATE dvut SET downvote = '$newVote' WHERE code = '$code'";
    return $conn->query($sql);
}

function setVoted () {
    global $conn;
    $user = $_SESSION['user'];
    $sql = "UPDATE users SET voted = '1' WHERE code = '$user'";
    return $conn->query($sql);
}

function getStatics() {
    global $conn;
    $sql = "SELECT * FROM users";
    $sql1 = "SELECT * FROM users WHERE voted = '1'";
    $sql2 = "SELECT * FROM users WHERE xeploai = '1' AND xeploaichinhthuc = false";
    $sql3 = "SELECT * FROM users WHERE xeploai = '2' AND xeploaichinhthuc = false";
    $sql4 = "SELECT * FROM users WHERE xeploai = '3' AND xeploaichinhthuc = false";
    $sql5 = "SELECT * FROM users WHERE xeploai = '4' AND xeploaichinhthuc = false";
    $sql6 = "SELECT * FROM users WHERE xeploaichinhthuc = '1'";
    $sql7 = "SELECT * FROM users WHERE xeploaichinhthuc = '2'";
    $sql8 = "SELECT * FROM users WHERE xeploaichinhthuc = '3'";
    $sql9 = "SELECT * FROM users WHERE xeploaichinhthuc = '4'";
    $res = array(
        'users' => $conn->query($sql)->num_rows,
        'voted' => $conn->query($sql1)->num_rows,
        'yeukem' => $conn->query($sql2)->num_rows + $conn->query($sql6)->num_rows,
        'trungbinh' => $conn->query($sql3)->num_rows + $conn->query($sql7)->num_rows,
        'kha' => $conn->query($sql4)->num_rows + $conn->query($sql8)->num_rows,
        'xuatsac' => $conn->query($sql5)->num_rows + $conn->query($sql9)->num_rows,
    );

    return $res;
}
function getAllUser () {
    global $conn;
    $sql = "SELECT * FROM users";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function forbiden () {
    http_response_code(403);
    die('Bạn không có quyền xem trang này');
}

function getUnvoted () {
    global $conn;
    $sql = "SELECT code, name FROM users WHERE voted = '0'";
    return $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function Redirect ($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function updateHash ($code) {
    global $conn;
    $newHash = str_random(100);
    $sql = "UPDATE users SET hash = '$newHash' WHERE code = '$code'";
    return $conn->query($sql);
}
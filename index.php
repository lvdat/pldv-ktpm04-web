<?php
$root = 'main';
$customTitle = 'Thông tin xếp loại Đoàn viên';
if(isset($_GET['page'])) {
    if($_GET['page'] == 'dvut') {
        $root = 'dvut';
        $customTitle = 'Bình xét DVUT';
    } elseif ($_GET['page'] == 'unvoted') {
        $root = 'unvoted';
        $customTitle = 'Danh sách Đoàn viên chưa bình xét Đoàn viên ưu tú';
    } else {
        $root = $_GET['page'];
    }
}

require 'includes/header.php';

if ($root == 'error') {
    $error_code = isset($_GET['code']) ? $_GET['code'] : '';
    require './views/error.php';
} else {
    if(!checkLogin()) {
        require './views/pageNotLogin.php';
        } else {
            if($root == 'main') {
                // require 'views/bchVote.php';
                Redirect ('/votebch');
            } else if($root == 'dvut') {
                require './views/dvutPage.php';
            } else if($root == 'unvoted') {
                require './views/unVotedPage.php';
            } else if($root == 'unvotedBCH') {
                require './views/unVotedBCHPage.php';
            } else if($root == 'votebch') {
                require './views/bchVote.php';
            }
    }
}

require 'includes/footer.php';
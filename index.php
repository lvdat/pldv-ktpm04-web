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

require __DIR__ . '/includes/header.php';

if ($root == 'error') {
    $error_code = isset($_GET['code']) ? $_GET['code'] : '';
    require __DIR__ . '/views/error.php';
} else {
    if(!checkLogin()) {
        require __DIR__ . '/views/pageNotLogin.php';
        } else {
            if($root == 'main') {
                // require 'views/bchVote.php';
                Redirect ('/votebch');
            } else if($root == 'dvut') {
                require __DIR__ . '/views/dvutPage.php';
            } else if($root == 'unvoted') {
                require __DIR__ . '/views/unVotedPage.php';
            } else if($root == 'unvotedBCH') {
                require __DIR__ . '/views/unVotedBCHPage.php';
            } else if($root == 'votebch') {
                require __DIR__ . '/views/bchVote.php';
            }
    }
}

require 'includes/footer.php';
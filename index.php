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
    }
}

require 'includes/header.php';

if(!checkLogin()) {
   require 'views/pageNotLogin.php';
} else {
    if($root == 'main') {
        require 'views/homePageLogin.php';
    } else if($root == 'dvut') {
        require 'views/dvutPage.php';
    } else if($root = 'unvoted') {
        require 'views/unVotedPage.php';
    }
}
require 'includes/footer.php';
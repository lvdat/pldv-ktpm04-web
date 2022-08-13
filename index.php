<?php
$root = 'main';
$customTitle = 'Thông tin ĐV';
if(isset($_GET['page'])) {
    if($_GET['page'] == 'dvut') {
        $root = 'dvut';
        $customTitle = 'Bình xét DVUT';
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
    }
}
require 'includes/footer.php';
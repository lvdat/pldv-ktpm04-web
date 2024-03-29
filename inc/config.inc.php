<?php
require_once 'functions.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$config = array(
    'site_title' => $_ENV['APP_TITLE'],
    'zalo' => $_ENV['ZALO'],
    'email' => $_ENV['EMAIL'],
    'xeploai' => array(
        'YẾU KÉM',
        'TRUNG BÌNH',
        'KHÁ',
        'XUẤT SẮC'    
    ),
    'xeploai_color' => array(
        'red',
        'orange',
        'purple',
        'green'
    ),
    'statics' => getStatics(),
    'bch' => array(
        'B2012255',
        'B2012191',
        'B2012264',
        'B2012253',
        'B2012208'
    ),
    'isFinalResult' => $_ENV['IS_FINAL_RESULT'] == 'true',
    'dvut_status' => array(
        'Đang xét duyệt',
        'Không đủ điều kiện',
        'Đủ điều kiện',
    ),
    'dvut_color' => array(
        'orange',
        'red',
        'green',
    ),
    'bch_vote_status' => array (
        'Đang bầu',
        'Trúng cử',
        'Tái cử',
        'Không trúng cử'
    ),
    'old_position' => array (
        'Không',
        'Bí thư',
        'Phó Bí thư',
        'Uỷ viên'
    ),
    'bch_vote_color' => array(
        'orange',
        'green',
        'green',
        'red',
    ),
    'google_client_id' => $_ENV['GOOGLE_CLIENT_ID'],
    'google_client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
    'google_redirect_url' => $_ENV['GOOGLE_REDIRECT_URI'],
    'hide' => array (
        'statistics' => $_ENV['HIDE_STATISTICS'] === 'true',
        'contact' => $_ENV['HIDE_CONTACT_INFO'] === 'true',
        'pldv' => $_ENV['HIDE_PLDV_LINK'] === 'true',
        'dvut' => $_ENV['HIDE_DVUT_LINK'] === 'true',
        'bchvote' => $_ENV['HIDE_BCHVOTE_LINK'] === 'true',
        'arisu_gif' => $_ENV['ARISU_GIF'] === 'false',
    )
);
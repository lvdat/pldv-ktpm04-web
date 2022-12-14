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
        'B2012227',
        'B2012253',
        'B2012208'
    ),
    'isFinalResult' => $_ENV['IS_FINAL_RESULT'] == 'true',
    'dvut_status' => array(
        'Không đủ điều kiện',
        'Đủ điều kiện',
    ),
    'dvut_color' => array(
        'red',
        'green',
    )
);
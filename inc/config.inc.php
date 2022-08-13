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
    'statics' => getStatics()
);
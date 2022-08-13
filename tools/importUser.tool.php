<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/load.php';
use Shuchkin\SimpleXLSX;

if ( $xlsx = SimpleXLSX::parse('csv/xeploaidoanvieninput.xlsx') ) {
    // print_r( $xlsx->rows() );
} else {
    echo SimpleXLSX::parseError();
}

$arr = $xlsx->rows();

for($i = 1; $i < count($arr); $i++) {
    $hash = str_random(30);
    $bruh = array(
        'code' => $arr[$i][1],
        'name' => $arr[$i][2],
        'email' => $arr[$i][10],
        'dtb1' => $arr[$i][3],
        'dtb2' => $arr[$i][4],
        'dtb' => $arr[$i][5],
        'drl1' => $arr[$i][6],
        'drl2' => $arr[$i][7],
        'drl' => $arr[$i][8],
        'xeploai' => $arr[$i][9],
        'sdt' => $arr[$i][11],
        'hash' => $hash
    );
    addUser($bruh);
    echo $i . ' - Imported <br>';
}
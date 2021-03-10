<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

$dbhost = "localhost";
$dbname = "qltt4";
$dbusername = "root";
$dbpassword = '';
//-- Kết Nối PDO --//

// Kiểm tra kết nối
try {
$db = new PDO("mysql:host=localhost;dbname=$dbname", $dbusername, $dbpassword);
$db->exec("set names utf8"); //Set bảng mã
} catch (PDOException $e) {
    //echo $e->getMessage();
    echo'Loi ket noi';
    exit;
}
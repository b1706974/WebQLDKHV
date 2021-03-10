<?php
require_once('database.class.php');
require_once('class.sinhvien.php');
require_once('class.detai.php');
require_once('class.giangvien.php');
if(isset($_GET["magv"])){
    $magv = $_GET["magv"];
    $gv = new giangvien();
    $ketqua = $gv ->xoaGV($magv);

    if(!$ketqua){
        echo "<script>  alert('Có lỗi xảy ra! Vui lòng liên hệ Amdin'); window.location='trangchu.php';</script>";
    } else {
        echo "<script>  alert('Xóa giảng viên thành công!'); window.location='trangchu.php';</script>";
    }
}
if(isset($_GET["masv"])){
    $masv = $_GET["masv"];
    $sv = new sinhvien();
    $ketqua = $sv ->xoaSV($masv);

    if(!$ketqua){
        echo "<script>  alert('Có lỗi xảy ra! Vui lòng liên hệ Amdin'); window.location='trangchu.php';</script>";
    } else {
        echo "<script>  alert('Xóa sinh viên thành công!'); window.location='trangchu.php';</script>";
    }
}
?>
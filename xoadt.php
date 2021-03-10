<?php
require_once('database.class.php');
require_once('class.sinhvien.php');
require_once('class.detai.php');
require_once('class.giangvien.php');
require_once('class.namhoc.php');
    if(isset($_GET["madt"])){
        $madt = $_GET["madt"];
        $dt = new detai();
        $ketqua = $dt ->xoaDT($madt);

        if(!$ketqua){
            echo "<script>  alert('Có lỗi xảy ra! Vui lòng liên hệ Amdin'); window.location='trangchu.php';</script>";
        } else {
            echo "<script>  alert('Xóa đề tài thành công!'); window.location='trangchu.php';</script>";
        }
    }
    if(isset($_GET["manh"])){
        $manh = $_GET["manh"];
        $nh = new namhoc();
        $ketqua = $nh ->xoaNH($manh);

        if(!$ketqua){
            echo "<script>  alert('Có lỗi xảy ra! Vui lòng liên hệ Amdin'); window.location='trangchu.php';</script>";
        } else {
            echo "<script>  alert('Xóa năm học thành công!'); window.location='trangchu.php';</script>";
        }
    }
?>
<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
$nh = new namhoc();
if (! isset($_GET['manh']) || $nh->checkNH($_GET['manh']) == false ) {
    echo '<div class="alert alert-danger">Năm học không tồn tại!!!</div>';
    exit();
}
$nhm = new namhoc();
$namhoc = $nhm->layMotNH($_GET['manh']);
if( isset($_POST['sm_suanh']) ) {
    if ( $_POST['ten_nh'] ==""){
        echo '<div class="alert alert-danger alert-dismissable">Hãy kiểm tra thông tin!!!</div>';
    }
    else{
        $nhmoi = new namhoc();
        $nhmoi->setTennh($_POST['ten_nh']);
        $kq = $nhmoi->suaNH($_GET['manh']);
        if ($kq){
            $_SESSION['suanh']= 'done';
            header('location:trangchu.php');
        }
        else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }

    }
}

?>
<div class="sua">
    <div class="back_to"><a href="trangchu.php">Trở về</a></div>
    <form method="post" name="form_sua">
        <div class="nam_hoc">
            <label class="col-md-5" for="ten_dt">Năm học</label>
            <input class="col-md-7" type="text" id="tennh" name="ten_nh" value="<?php echo $namhoc['TenNH']?>">
        </div>
        <div class="btn-zz">
            <input type="submit" value="Cập nhật" name="sm_suanh">
        </div>

    </form>
</div>

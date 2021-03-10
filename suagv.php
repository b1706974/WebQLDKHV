<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
$gvm = new giangvien();
if (! isset($_GET['magv']) || $gvm->checkGV($_GET['magv']) == false ) {
    echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Giảng viên không tồn tại!!!
                            </div>';
    exit();
}
$gvm = new giangvien();
$gv = $gvm->layMotGV($_GET['magv']);
if( isset($_POST['sm_suagv']) ) {

    if ( $_POST['ten_gv'] == "" || $_POST['mk_gv'] == "" ){
        echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Hãy kiểm tra thông tin!!!
                            </div>';
    }
    else{
        $gvmoi = new giangvien();
        $gvmoi->setTengv($_POST['ten_gv']);
        $gvmoi->setMatkhau($_POST['mk_gv']);
        $kq = $gvmoi->suaGV($_GET['magv']);
        if ($kq){
            $_SESSION['suagv']= 'done';
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
        <div class="sua_ten_gv">
            <label class="col-md-5" for="ten_gv">Họ tên</label>
            <input class="col-md-7" type="text" id="ten_gv" name="ten_gv" value="<?php echo $gv['TenGV']?>">
        </div>
        <div class="sua_mk_gv">
            <label class="col-md-5" for="mk_gv">Mật khẩu</label>
            <input class="col-md-7" type="text" id="mk_gv" name="mk_gv" value="<?php echo $gv['MatKhau']?>">
        </div>
        <div class="btn-zz">
            <input type="submit" value="Cập nhật" name="sm_suagv">
        </div>

    </form>
</div>

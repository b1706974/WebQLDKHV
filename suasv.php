<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
$svm = new sinhvien();
if (! isset($_GET['masv']) || $svm->checkSV($_GET['masv']) == false ) {
    echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Sinh viên không tồn tại!!!
                            </div>';
    exit();
}
$svm = new sinhvien();
$sv = $svm->layMotSV($_GET['masv']);
if( isset($_POST['sm_suasv']) ) {

    if ( $_POST['ten_sv'] == "" || $_POST['mk_sv'] == "" ){
        echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Hãy kiểm tra thông tin!!!
                            </div>';
    }
    else{
        $svmoi = new sinhvien();
        $svmoi->setTensv($_POST['ten_sv']);
        $svmoi->setMatkhau($_POST['mk_sv']);
        $kq = $svmoi->suaSV($_GET['masv']);
        if ($kq){
            $_SESSION['suasv']= 'done';
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
        <div class="sua_ten_sv">
            <label class="col-md-5" for="ten_sv">Họ tên</label>
            <input class="col-md-7" type="text" id="ten_sv" name="ten_sv" value="<?php echo $sv['TenSV']?>">
        </div>
        <div class="sua_mk_sv">
            <label class="col-md-5" for="mk_sv">Mật khẩu</label>
            <input class="col-md-7" type="text" id="mk_sv" name="mk_sv" value="<?php echo $sv['MatKhau']?>">
        </div>
        <div class="btn-zz">
            <input type="submit" value="Cập nhật" name="sm_suasv">
        </div>

    </form>
</div>

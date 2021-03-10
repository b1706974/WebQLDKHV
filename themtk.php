<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
if( isset($_POST['sm_themtk']) ) {
    if ( $_POST['ten_tk'] =="" || $_POST['hoten']=="" || $_POST['mk']=="" || $_POST['khoa']==""){
        echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Hãy điền đầy đủ thông tin!!!
                            </div>';
    }
    else {
        if ($_POST['loai'] == 'gv'){
            $gvm = new giangvien();
            $gvm->setMagv($_POST['ten_tk']);
            $gvm->setTengv($_POST['hoten']);
            $gvm->setMatkhau($_POST['mk']);
            $kq = $gvm->themGV();
            if ($kq){
                echo '<div class="alert alert-success"> Thêm giảng viên mới thành công</div>';
            }
            else{
                echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
            }
        }
        if ($_POST['loai'] == 'sv'){
            $svm = new sinhvien();
            $svm->setMasv($_POST['ten_tk']);
            $svm->setTensv($_POST['hoten']);
            $svm->setMatkhau($_POST['mk']);
            $svm->setKhoaSv($_POST['khoa']);
            $kq = $svm->themSV();
            if ($kq){
                echo '<div class="alert alert-success"> Thêm sinh viên mới thành công</div>';
            }
            else{
                echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
            }
        }

    }
}

?>
<nav class="navbar navbar-inverse">
    <h3>Thêm tài khoản mới</h3>
</nav>
<div class="them">
    <form method="post" name="form_them">
        <div class="them_tk_loai">
            <label class="col-md-5" for="loai">Kiểu tài khoản:</label>
            <select class="col-md-7" id="loai" name="loai">
                <option value="gv">Giảng viên:</option>
                <option value="sv">Sinh viên:</option>
            </select>
        </div>
        <div class="them_ten_tk">
            <label for="ten_tk" class="col-md-5">Mã số CB/SV:</label>
            <input class="col-md-7" type="text" id="ten_tk" name="ten_tk">
        </div>
        <div class="them_hoten">
            <label for="hoten" class="col-md-5">Họ tên:</label>
            <input class="col-md-7" type="text" id="hoten" name="hoten">
        </div>
        <div class="them_mk">
            <label for="mk" class="col-md-5">Mật khẩu:</label>
            <input class="col-md-7" type="text" id="mk" name="mk">
        </div>
        <div class="them_khoa">
            <label for="khoa" class="col-md-5">Niên Khóa:</label>
            <input class="col-md-7" type="text" id="khoa" name="khoa">
        </div>
        <div class="btn-zz">
            <input type="submit" value="Thêm tài khoản" name="sm_themtk">
        </div>
    </form>
</div>

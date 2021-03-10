<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
//xu lý them
if( isset($_POST['sm_themnh']) ) {
    if ( $_POST['ten_nh'] =="" ){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else {
        $nhmoi = new namhoc();
        $nhmoi->setTennh($_POST['ten_nh']);
        $kq = $nhmoi->themNH();
        if ($kq){
            echo '<div class="alert alert-success"> Thêm năm học mới thành công</div>';
        }
        else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }
    }
}

?>
<div class="them">
    <div class="back_to"><a href="trangchu.php">Trở về</a></div>
    <form method="post" name="form_them">
        <div class="them_namhoc">
            <label  class="col-md-5" for="ten_dt">Năm học</label>
            <input  class="col-md-7" type="text" id="tennh" name="ten_nh">
        </div>

        <div class="btn-zz">
            <input type="submit" value="Thêm năm học" name="sm_themnh">
        </div>

    </form>
</div>

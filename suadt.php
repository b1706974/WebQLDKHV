<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
include ('header.php');
$dtm = new detai();
if (! isset($_GET['madt']) || $dtm->checkDT($_GET['madt']) == false ) {
    echo '<div class="alert alert-danger alert-dismissable">Đề tài không tồn tại!!!</div>';
    exit();
}
$dtm = new detai();
$dt = $dtm->layMotDT($_GET['madt']);
$sv = new sinhvien();
$sv_list = $sv->laySV();
$nhm = new namhoc();
$nh = $nhm->layNH();
if( isset($_POST['sm_suadt']) ) {

    if ( $_POST['ten_dt'] =="" || $_POST['nh']=="" ){
        echo '<div class="alert alert-danger alert-dismissable">Hãy kiểm tra thông tin!!!</div>';
    }
     else{
        $dtmoi = new detai();
        $dtmoi->setTendt($_POST['ten_dt']);
        $dtmoi->setMasv($_POST['sv']);
        $dtmoi->setNamhoc($_POST['nh']);
        $dtmoi->setMagv($_SESSION['user']);
        $dtmoi->setTrangthai($_POST['trangthai']);
        $dtmoi->setDiem($_POST['diem']);
        $kq = $dtmoi->suaDT($_GET['madt']);
        if ($kq){
            $_SESSION['suadt']= 'done';
            header('location:index.php');
        }
        else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }

    }
}

?>
<div class="sua">
    <div class="back_to"><a href="index.php">Trở về</a></div>
    <form method="post" name="form_sua">
        <div class="them_ten_dt">
            <label class="col-md-5" for="ten_dt">Tên đề tài</label>
            <input class="col-md-7" type="text" id="tendt" name="ten_dt" value="<?php echo $dt['TenDT']?>">
        </div>
        <div class="them_tensv">
            <label class="col-md-5" for="masv">Sinh viên</label>
            <select class="col-md-7" id="masv" name="sv">
                <?php
                foreach ($sv_list as $item){
                    echo '<option value="'.$item["MaSV"].'" ';
                    if ( isset($dt['MaSV']) && $dt['MaSV'] == $item['MaSV']){
                        echo 'selected';
                    }
                    echo '>'.$item["TenSV"].' - '.$item["MaSV"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="them_tensv">
            <label class="col-md-5" for="manh">Năm học</label>
            <select class="col-md-7" id="manh" name="nh">
                <option value="">---Select---</option>
                <?php
                foreach ($nh as $item_nh){
                    echo '<option value="'.$item_nh["MaNH"].'" ';
                    if ( isset($dt['MaNH']) && $dt['MaNH'] == $item_nh['MaNH']){
                        echo 'selected';
                    }
                    echo '>'.$item_nh["TenNH"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="sua_dt_tt">
            <label class="col-md-5" for="trang_thai">Trạng thái</label>
            <select class="col-md-7" name="trangthai" id="trangthai">
                <option value="Chờ phê duyệt" <?php if (isset($dt['TrangThai']) && $dt['TrangThai'] == 'Chờ phê duyệt') echo 'selected';?>>Chờ phê duyệt</option>
                <option value="Chấp nhận" <?php if (isset($dt['TrangThai']) && $dt['TrangThai'] == 'Chấp nhận') echo 'selected';?>>Chập nhận</option>
            </select>
        </div>
        <div class="diem">
            <label class="col-md-5" for="diem">Điểm</label>
            <input class="col-md-7" type="text" name="diem" id="diem" value="<?php echo $dt['Diem']?>">
        </div>
        <div class="btn-zz">
            <input type="submit" value="Cập nhật" name="sm_suadt">
        </div>

    </form>
</div>

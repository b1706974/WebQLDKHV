<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<?php
include ('header.php');
$gv = new giangvien();
$gv_list = $gv->layGV();
$nh = new namhoc();
$list_nh = $nh->layNH();
//xu lý them
if( isset($_POST['sm_themdt']) ) {
    if ( $_POST['ten_dt'] =="" || $_POST['nh'] =="" ){
        echo '<div class="alert alert-danger">Hãy điền đầy đủ thông tin!!!</div>';
    }
    else {
        $dtmoi = new detai();
        $dtmoi->setTendt($_POST['ten_dt']);
        $dtmoi->setMasv($_SESSION['user']);
        $dtmoi->setMagv($_POST['gv']);
        $dtmoi->setNamhoc($_POST['nh']);
        $dtmoi->setTrangthai("Chờ phê duyệt");
        $dtmoi->setDiem('');
        $kq = $dtmoi->themDT();
        if ($kq){
            echo '<div class="alert alert-success"> Thêm đề tài thành công</div>';
        }
        else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }
    }
}

?>
<div class="them">
    <form method="post" name="form_them">
        <div class="them_ten_dt">
            <label class="col-md-5" for="ten_dt">Tên đề tài</label>
            <input class="col-md-7" type="text" id="tendt" name="ten_dt">
        </div>
        <div class="them_tensv">
            <label class="col-md-5" for="magv">Giảng viên</label>
            <select class="col-md-7" id="magv" name="gv">
                <?php
                foreach ($gv_list as $item){
                    echo '<option value='.$item["MaGV"].'>'.$item["TenGV"].' - '.$item["MaGV"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="them_namhoc">
            <label class="col-md-5" for="manh">Năm học</label>
            <select class="col-md-7" id="manh" name="nh">
                <option value="">---Select---</option>
                <?php
                foreach ($list_nh as $item_nh){
                    echo '<option value='.$item_nh["MaNH"].'>'.$item_nh["TenNH"].'</option>';
                }
                ?>
            </select>
        </div>
        </br>
        <div class="btn-zz">
            <input type="submit" value="Thêm đề tài" name="sm_themdt">
        </div>

    </form>


    <div class="w3-container">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-orange" style="margin-left: 210px;margin-top: 0px">Đình kèm File</button>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <header class="w3-container w3-teal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <h2>Đính kèm file</h2>
                </header>
                <div class="w3-container">

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileUpload" value="">
                        <input type="submit" name="up" value="Upload">
                    </form>
                </div>
                <?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "Upload lỗi rồi!";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upimage/' . $_FILES['fileUpload']['name']);
        echo "<b>--Đã upload thành công-- </b><br/>";
        echo '<b>.Loại file</b>: ' . $_FILES['fileUpload']['type'] . '<br>';
        echo '<b>.Dung lượng</b>: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';
    }
}
?>
                <footer class="w3-container w3-teal">
                    <p style="background-color:red"> Sinh viên nộp file đặt tên theo cú pháp: MSSV_TenSV_TenDT</p>
                </footer>
            </div>
        </div>
    </div>
</div>

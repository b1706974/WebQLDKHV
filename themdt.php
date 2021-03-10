<head>
    <meta charset="utf-8">
    <title>Hệ thống quản lý đề tài thực tập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<?php
    include ('header.php');
    $sv = new sinhvien();
    $sv_list = $sv->laySV();
    $nh = new namhoc();
    $list_nh = $nh->layNH();
    //xu lý them
    if( isset($_POST['sm_themdt']) ) {
        if ( $_POST['ten_dt'] =="" || $_POST['nh'] ==""){
            echo '<div class="alert alert-danger alert-dismissable">Hãy điền đầy đủ thông tin!!!</div>';
        }
        else {
            $dtmoi = new detai();
            $dtmoi->setTendt($_POST['ten_dt']);
            $dtmoi->setMasv($_POST['sv']);
            $dtmoi->setMagv($_SESSION['user']);
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
            <label  class="col-md-5" for="ten_dt">Tên đề tài</label>
            <input  class="col-md-7" type="text" id="tendt" name="ten_dt">
        </div>
        <div class="them_tensv">
            <label  class="col-md-5" for="masv">Sinh viên</label>
            <select  class="col-md-7" id="masv" name="sv">
                <?php
                foreach ($sv_list as $item){
                    echo '<option value='.$item["MaSV"].'>'.$item["TenSV"].' - '.$item["MaSV"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="them_namhoc">
            <label  class="col-md-5" for="manh">Năm học</label>
            <select  class="col-md-7" id="manh" name="nh">
                <option value="">---Select---</option>
                <?php
                foreach ($list_nh as $item_nh){
                    echo '<option value='.$item_nh["MaNH"].'>'.$item_nh["TenNH"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="btn-zz">
            <input type="submit" value="Thêm bài tập" name="sm_themdt"> 
              
        </div>

    </form>
</div>

<?php
session_start();
require_once('database.class.php');
require_once('class.sinhvien.php');
require_once('class.detai.php');
require_once('class.giangvien.php');
if(isset($_POST['btn_login'])){
    $u= $_POST['user'];
    $p= $_POST['pass'];
    if($u && $p){
        $gv = new giangvien();
        $sv = new sinhvien();
        $kq1 = $gv->checkLoginGV($u,$p);
        $kq2 = $sv->checkLoginSV($u,$p);

        if ($kq1){
            $_SESSION["user"] = $u;
            $_SESSION["per"] = 'gv';
            header("location:trangchu.php");
        }elseif ($kq2){
            $_SESSION["user"] = $u;
            $_SESSION["per"] = 'sv';
            header("location:trangchu.php");
        }elseif ( $u =='admin' && $p == 'admin' ){
            $_SESSION["user"] = $u;
            $_SESSION["per"] = 'admin';
            header("location:trangchu.php");
        }
        else{
            echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info-circle"></i> Tài khoản hoặc mật khẩu không đúng!!!
                            </div>';
        }
    }
}
?>
<html lang="vi">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .Notiboard {
            background-color: white;
            position: absolute;
            right: 20px;
            margin-top: 30px;
            width: 400px;
            border: 4px outset;
            padding: 15px;
            border-radius: 20px;

        }

        .Calender {
            background-color: white;
            position: absolute;
            left: 5px;
            margin-top: 30px;
            width: 250px;
            padding: 15px;
            border-radius: 20px;

        }

        .form-signin {
            width: 500px;
            padding: 10px 50px;
            border-radius: 10px;
            border: 4px solid red;
            position: absolute;
            left: 300px;
        }

        h2 {
            color: black;
            font-family: time new roman;
            font-size: 30px;
            text-transform: uppercase;
            font-weight: bold;
            position: absolute;
            left: 300px;
            top: 130px;

        }

        h3 {
            color: orangered;
            font-family: time new roman;
            margin: auto;
            padding: 0;
            text-align: center;
        }

    </style>
</head>

<body>
    <img src="https://theprsb.org/wp-content/uploads/2018/12/podcast2-1300x100.png" alt="W3Schools.com" style="width:1350px;height:100px;">
    <br>
    <div class="Notiboard">
        <font>
            <marquee direction="left" style="background:orange">THÔNG BÁO</marquee>
        </font>
        <td width=" 40" align="left" valign="top">&nbsp;</td>
        <td id="module-thongbao" align="left" valign="top">
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    1.<b>[Thầy Trương Minh Thái]</b> Đã cập nhật điểm cho môn <b>CNPMK43 2020</b>.</a>
            </li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    2. <b>[Cố vấn học tập]</b>Thông báo kế hoạch giảng dạy và đăng ký học phần học kỳ 3, năm học 2019-2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    3.<b>[Thầy Trần Công Án] </b>Kế hoạch điều chỉnh xét và phát bằng tốt nghiệp đợt 2 - năm 2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    4.<b>[Thông báo]</b> Cảnh cáo học vụ sinh viên <b>Đào Chí Bửu.</b></a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    5. <b>[Chi Đoàn]</b>Thông báo lớp CNTTCLC02 Khóa 43 đóng tiền Đoàn đợt 4, học kỳ 2 năm học 2019-2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    6. Tiếp tục triển khai kế hoạch giảng dạy không tập trung học kỳ 2 năm học 2019-2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    7. Thông báo học GDQP&AN đợt 3, học kỳ 2 năm học 2019-2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    8. Thông báo kế hoạch học GDQP&AN đợt 2, 2019-2020 (điều chỉnh lần 3).</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    9. Triển khai kế hoạch giảng dạy Học kỳ 2, 2019-2020.</a></li>
            <li><a href="https://www.ctu.edu.vn/tin-tuc.html" target="_blank">
                    10. Thông báo điều chỉnh kế hoạch giảng dạy Học kỳ 2 và Học kỳ 3, 2019-2020.</a></li>
        </td>
    </div>


    <div class="login100-pic js-tilt" data-tilt>
        <h2> Đăng nhập</h2>
    </div>
    <div class"container">
        <div class="login">
            <form method="post" class="form-signin">
                <label for="inputEmail" class="txt col-md-5">Tài khoản:</label>
                <input type="text" name="user" class="col-md-7" placeholder="Username" required autofocus>
                <label for="inputPassword" class="txt col-md-5">Mật khẩu:</label>
                <input type="password" name="pass" class="col-md-7" placeholder=" Password" required>
                <button class="btn_login" name="btn_login" type="submit">Đăng nhập </button>

            </form>
        </div>
    </div>


</body>

</html>

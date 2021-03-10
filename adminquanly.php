<?php
if (isset($_SESSION['suagv']) && $_SESSION['suagv'] == 'done') {
    echo '<div class="alert alert-success"> Cập nhật thành công!!!</div>';
    $_SESSION['suagv'] = "";
}
if (isset($_SESSION['suasv']) && $_SESSION['suasv'] == 'done') {
    echo '<div class="alert alert-success"> Cập nhật thành công!!!</div>';
    $_SESSION['suasv'] = "";
}
if (isset($_SESSION['suanh']) && $_SESSION['suanh'] == 'done') {
    echo '<div class="alert alert-success"> Cập nhật thành công!!!</div>';
    $_SESSION['suasv'] = "";
}
?>
<nav class="navbar navbar-inverse" >
<h3>Trang quản lý ADMIN</h3>
</nav>
</br>
<a href="themtk.php" class="button_them">Thêm tài khoản</a>
<a href="searchf.php" class="button_them">DS sinh viên chưa có điểm </a>

<div class="tbl_gv">
    <h4>Danh sách giảng viên</h4>
    <table border="2">
        <tr>
            <th>Mã giảng viên</th>
            <th>Họ tên</th>
            <th>Mật khẩu</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $gv = new giangvien();
        $dsgv = $gv->layGV();
        foreach ($dsgv as $item) {
            echo '<tr>';
            echo '<td>' . $item["MaGV"] . '</td>';
            echo '<td>' . $item["TenGV"] . '</td>';
            echo '<td>' . $item["MatKhau"] . '</td>';
            echo '<td><a href="suagv.php?magv=' . $item["MaGV"] . '">Sửa</a>|<a href="xoatk.php?magv=' . $item["MaGV"] . '">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
<div class="tbl_sv">
    <h4>Danh sách sinh viên</h4>
    <table border="2">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Mật khẩu</th>
            <th>Niên Khóa</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $sv = new sinhvien();
        $dssv = $sv->laySV();
        foreach ($dssv as $item) {
            echo '<tr>';
            echo '<td>' . $item["MaSV"] . '</td>';
            echo '<td>' . $item["TenSV"] . '</td>';
            echo '<td>' . $item["MatKhau"] . '</td>';
            echo '<td>' . $item["KhoaSv"] . '</td>';
            echo '<td><a href="suasv.php?masv=' . $item["MaSV"] . '">Sửa</a>|<a href="xoatk.php?masv=' . $item["MaSV"] . '">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
<div class="tbl_nh">
    <h4>Danh sách năm học</h4>
    <a href="themnamhoc.php" class="button_them">Thêm năm học</a>
    <table border="2">
        <tr>
            <th>Mã</th>
            <th>Năm học</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $nh = new namhoc();
        $dsnh = $nh->layNH();
        foreach ($dsnh as $item) {
            echo '<tr>';
            echo '<td>' . $item["MaNH"] . '</td>';
            echo '<td>' . $item["TenNH"] . '</td>';
            echo '<td><a href="suanh.php?manh=' . $item["MaNH"] . '">Sửa</a>|<a href="xoadt.php?manh=' . $item["MaNH"] . '">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div>
    <p></p>
</div>


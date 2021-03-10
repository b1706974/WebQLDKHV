<?php
$sv = new sinhvien();
$sv_info = $sv->layMotSV($user);
?>
<nav class="navbar navbar-inverse" >
<h3>Trang quản lý cho sinh viên</h3>
</nav>
<h5 class="ttsv"><b>Mã sinh viên:</b> <?php echo $sv_info['MaSV']?></h5>
<h5 class="ttsv"><b>Họ tên:</b> <?php echo $sv_info['TenSV']?></h5>
<a href="themdtsv.php" class="button_them">Thêm bài tập</a>
<a href="logintkb.php" class="button_them">Thời Khóa Biểu</a>
<a href="inote-bai-5/inote-bai-7/signout.php" class="button_them">Thêm ghi chú</a>

<table border="1">
    <tr>
        <th>Mã bài tập bài</th>
        <th>Tên bài tập</th>
        <th>Giảng viên hướng dẫn</th>
        <th>Năm học</th>
        <th>Trạng thái</th>
        <th>Điểm</th>
    </tr>
    <?php
    $dt = new detai();
    $dsdt = $dt->layDTTheoSV($user);
    foreach ( $dsdt as $dt){
        $get_gv = new giangvien();
        $gv = $get_gv->layMotGV($dt["MaGV"]);
        $nh = new namhoc();
        $_nh = $nh->layMotNH($dt["MaNH"]);
        if ($trangthai= "Chờ phê duyệt") {
            $trangthai="<td style='background-color:yellow'/>";
        }
        else {
            $trangthai;
        }
        echo '<tr>';
        echo '<td>'.$dt["MaDT"].'</td>';
        echo '<td>'.$dt["TenDT"].'</td>';
        echo '<td>'.$gv["TenGV"].'</td>';
        echo '<td>'.$_nh["TenNH"].'</td>';
        echo '<td>'.$dt["TrangThai"].'</td>';
        echo '<td style="color:red">'.$dt["Diem"].'</td>';
        echo '</tr>';
    }
    ?>
</table>

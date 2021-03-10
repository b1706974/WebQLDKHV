<?php
if (isset($_SESSION['suadt']) && $_SESSION['suadt'] == 'done'){
    echo '<div class="alert alert-success"> Cập nhật đề tài thành công!!!</div>';
    $_SESSION['suadt'] = "";
}
$nhmoi = new namhoc();
$nh = $nhmoi->layNH();
?>
<nav class="navbar navbar-inverse">
    <h3>Trang quản lý cho cán bộ</h3>
</nav>
</br>
<a href="themdt.php" class="button_them">Thêm bài tập</a>
<a href="inote-bai-5/inote-bai-7/signout.php" class="button_them">Thêm ghi chú</a>
<div class="hiendt-theonam">
    <form name="loctheonam" method="post" style="border:none;">
        <label class="label-sxtheonamhoc">Lọc theo năm học</label>
        <select name="nh">
            <option value="null">---Select---</option>
            <?php
           foreach ($nh as $item){
               ?>
            <option value="<?php echo $item['MaNH'] ?>"><?php echo $item['TenNH'] ?></option>
            <?php
           }
           ?>
        </select>
        <input type="submit" name="sb_loc" value="Hiển thị">
    </form>
</div>

<?php
if (isset($_POST['nh']) && $_POST['nh']!=="null"){
    ?>
    <table border="1">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên sinh viên</th>
            <th>Mã đề tài</th>
            <th>Tên đề tài</th>
            <th>Năm học</th>
            <th>Trạng thái</th>
            <th>Điểm</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $dt = new detai();
        $dsdt = $dt->layDTTheoNH($_POST['nh']);
        foreach ( $dsdt as $dt){
            $get_sv = new sinhvien();
            $sv = $get_sv->layMotSV($dt["MaSV"]);
            $nhm = new namhoc();
            $nh = $nhm->layMotNH($dt['MaNH']);
            echo '<tr>';
            echo '<td>'.$dt["MaSV"].'</td>';
            echo '<td>'.$sv["TenSV"].'</td>';
            echo '<td>'.$dt["MaDT"].'</td>';
            echo '<td>'.$dt["TenDT"].'</td>';
            echo '<td>'.$nh["TenNH"].'</td>';
            echo '<td>'.$dt["TrangThai"].'</td>';
            echo '<td>'.$dt["Diem"].'</td>';
            echo '<td><a href="suadt.php?madt='.$dt["MaDT"].'">Sửa</a>|<a href="xoadt.php?madt='.$dt["MaDT"].'">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
}
else {
    ?>
    <table border="1">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên sinh viên</th>
            <th>Mã đề tài</th>
            <th>Tên đề tài</th>
            <th>Năm học</th>
            <th>Trạng thái</th>
            <th>Điểm</th>
            <th>Tùy chọn</th>
        </tr>
        <?php
        $dt = new detai();
        $dsdt = $dt->layDTTheoGV($user);
        foreach ( $dsdt as $dt){
            $get_sv = new sinhvien();
            $sv = $get_sv->layMotSV($dt["MaSV"]);
            $nhm = new namhoc();
            $nh = $nhm->layMotNH($dt['MaNH']);
            echo '<tr>';
            echo '<td>'.$dt["MaSV"].'</td>';
            echo '<td>'.$sv["TenSV"].'</td>';
            echo '<td>'.$dt["MaDT"].'</td>';
            echo '<td>'.$dt["TenDT"].'</td>';
            echo '<td>'.$nh["TenNH"].'</td>';
            echo '<td>'.$dt["TrangThai"].'</td>';
            echo '<td>'.$dt["Diem"].'</td>';
            echo '<td><a href="suadt.php?madt='.$dt["MaDT"].'">Sửa</a>|<a href="xoadt.php?madt='.$dt["MaDT"].'">Xóa</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Website quản lý/chấm điểm bài tập offline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        table{
            text-align: center
        }
    </style>

</head>
<img src="https://theprsb.org/wp-content/uploads/2018/12/podcast2-1300x100.png" alt="W3Schools.com" style="width:1350px;height:100px;">

<body>
    <?php
    include("header.php");

$mysqli = new mysqli("localhost", "root", "", "qltt4");
 
// Kiểm tra kết nối
if($mysqli === false){
    die("ERROR: Không thể kết nối. " . $mysqli->connect_error);
}
 

$sql = "SELECT * FROM detai Where TrangThai='Chờ phê duyệt'";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table border='1'>";
            echo "<tr>";
                echo "<th>MaDT</th>";
                echo "<th>TenDT</th>";
                echo "<th>MaSV</th>";
                echo "<th>MaNH</th>";
                echo "<th>TrangThai</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['MaDT'] . "</td>";
                echo "<td>" . $row['TenDT'] . "</td>";
                echo "<td>" . $row['MaSV'] . "</td>";
                echo "<td>" . $row['MaNH'] . "</td>";
                echo "<td>" . $row['TrangThai'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Giải phóng bộ nhớ của biến
        $result->free();
    } else{
        echo "Không có bản ghi nào được tìm thấy.";
    }
} else{
    echo "ERROR: Không thể thực thi câu lệnh $sql. " . $mysqli->error;
}
 
// Đóng kết nối
$mysqli->close();
?>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Files</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:lightyellow;">
    <img src="https://theprsb.org/wp-content/uploads/2018/12/podcast2-1300x100.png" alt="W3Schools.com" style="width:1350px;height:100px;">

    <body>


        <br />
        <hr />

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>

<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "Upload lỗi rồi!";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upimage/' . $_FILES['fileUpload']['name']);
        echo "upload thành công <br/>";
        echo 'Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
        echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
        echo 'Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';
    }
}
?>
   <br/>
    <div class="container">
          <a href="trangchu.php" class="btn btn-info" role="button">Trở về</a>
    </div>
    </body>

</html>

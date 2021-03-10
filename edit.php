<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thời khóa biểu </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
   <div class="container">
    <?php include("header.php");?>
<?php
require('config.php');
    
$get = $db->query("SELECT * FROM `TMQ` WHERE `id` = '1'")->fetch();

if(isset($_POST['edit'])){
    $thu2 = $_POST['thu2'];
    $thu3 = $_POST['thu3'];
    $thu4 = $_POST['thu4'];
    $thu5 = $_POST['thu5'];
    $thu6 = $_POST['thu6'];
    $thu7 = $_POST['thu7'];
$db->exec("UPDATE `TMQ` SET 
`thu2` = '$thu2',
`thu3` = '$thu3',
`thu4` = '$thu4',
`thu5` = '$thu5',
`thu6` = '$thu6',
`thu7` = '$thu7',
`time` = '". date('H:i:s d-m-Y') ."'
WHERE `id` = '1'
");    
}
?>
<style>
    .form-group{
    text-align: center;
        
    }
</style>

<form method="POST">
     <div class="form-group">
<div><label>Thứ 2:</label></div>
<textarea name="thu2" rows="6" cols="50"><?=$get['thu2'];?></textarea>
        </div>
        
         <div class="form-group">
<div><label>Thứ 3:</label></div>
<textarea name="thu3" rows="6" cols="50"><?=$get['thu3'];?></textarea>
</div>
 <div class="form-group">
<div><label>Thứ 4:</label></div>
<textarea name="thu4" rows="6" cols="50"><?=$get['thu4'];?></textarea>
</div>
 <div class="form-group">
<div><label>Thứ 5:</label></div>
<textarea name="thu5" rows="6" cols="50"><?=$get['thu5'];?></textarea>
</div>
 <div class="form-group">
<div><label>Thứ 6:</label></div>
<textarea name="thu6" rows="6" cols="50"><?=$get['thu6'];?></textarea>
</div>
 <div class="form-group">
<div><label>Thứ 7:</label></div>
<textarea name="thu7" rows="6" cols="50"><?=$get['thu7'];?></textarea>
</div>
 <div class="form-group">
     <input type="submit" name="edit" value="Sửa"  onclick="alert('Sửa thành công!')">
    </div>
</form>
</div>
</body>
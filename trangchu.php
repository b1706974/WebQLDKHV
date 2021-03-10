
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Website quản lý/chấm điểm bài tập offline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    
</head>
    <img src="https://theprsb.org/wp-content/uploads/2018/12/podcast2-1300x100.png" alt="W3Schools.com" style="width:1350px;height:100px;" >
<body>

        <font ><marquee direction="left" style="background:orange">Webite quản lý/chấm điểm bài tập offline--------SV thực hiện: Đào Chí Bửu</marquee>
    </font> 
    <div id="txt"></div>
       
<div class="containerv">
    <?php include("header.php");?>
    <div class="contents">
        <?php if (isset($_SESSION['user']) && isset($_SESSION['per']) && $_SESSION['per'] == 'admin' ) {
            $user = $_SESSION['user'];
            include ("adminquanly.php");
        }
        if (isset($_SESSION['user']) && isset($_SESSION['per']) && $_SESSION['per'] == 'gv' ) {
            $user = $_SESSION['user'];
            include ("gvquanly.php");
        }
        if (isset($_SESSION['user']) && isset($_SESSION['per']) && $_SESSION['per'] == 'sv' ) {
            $user = $_SESSION['user'];
            include ("svquanly.php");
        }
        ?>
    </div>
    <img src="https://thanhdattech.net/wp-content/uploads/2018/09/game-khung-long-trem-chrome.gif" style="width:400px;height:100px;">
</div>
</body>
</html>
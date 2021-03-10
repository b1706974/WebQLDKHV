<?php

session_start();
require_once('database.class.php');
require_once('class.sinhvien.php');
require_once('class.detai.php');
require_once('class.namhoc.php');
require_once('class.giangvien.php'); ?>
<nav class="navbar navbar-inverse" >
    <div class="navbar-collapse">
        <div class="pagehome col-md-7">
            <ul class="nav navbar-nav">
                <li><a href="trangchu.php">Trang chủ</a></li>
            </ul>
        </div>
        <div class="left-menu col-md-5">
            <?php
            if(isset($_SESSION['user'])){
                echo "<h3 class='hello'><span>Xin chào:</span> ".$_SESSION['user']."</h3>";
                ?>
            <div class="logout"><a href="logout.php"><li>Đăng xuất</li></a>    </div>
                <?php
            }else{
                header("Location:login.php");
            }
            ?>
        </div>
    </div>

</nav>

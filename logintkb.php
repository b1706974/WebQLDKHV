
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thời khóa biểu </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position:absolute /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  border-radius: 20px;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
    <img src="https://theprsb.org/wp-content/uploads/2018/12/podcast2-1300x100.png" alt="W3Schools.com" style="width:1350px;height:100px;" >
<body>
       
<div class="containerv">
    <?php include("header.php");?>
    <div class="contents">
        <?php 
        if (isset($_SESSION['user']) && isset($_SESSION['per']) && $_SESSION['per'] == 'gv' ) {
            $user = $_SESSION['user'];
            include ("tkb.php");
        }
        if (isset($_SESSION['user']) && isset($_SESSION['per']) && $_SESSION['per'] == 'sv' ) {
            $user = $_SESSION['user'];
            include ("tkb.php");
        }
        ?>
    </div>
</div>
    <!-- Trigger/Open The Modal -->
<button id="myBtn"></button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php
echo "<h3 style='text-align: center; color: red;'>";
echo "Chỉnh sửa lần cuối vào: ".$get['time'];
echo "</h3>";
?>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "E-wallet";
$conn = mysqli_connect($servername, $username, $password, $database);
  
$mobNo = $_SESSION['regName'];
$amnt = $_POST['Amnt'];

date_default_timezone_set("Asia/Kolkata");
$dt = date("Y-m-d");
$tm = date("H:i:s");

$sqlTo = "INSERT INTO MoneyDebited VALUES ($mobNo,$amnt,'$dt','$tm')";
$ch2 = mysqli_query($conn, $sqlTo);
if (!$ch2) {
    die(mysqli_error($conn));
}

$updt = "UPDATE `Balance` SET Bal = Bal - $amnt  WHERE MobileNo = $mobNo";
$ch = mysqli_query($conn, $updt);
if ($ch) {
    echo "<script>
  window.location.href='../Afterlogin.php';</script>";
}
     
mysqli_close($conn);

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

$amnt = $_POST['amnt'];

  session_start();

  $mobNo = $_SESSION['regName'];
  
  date_default_timezone_set("Asia/Kolkata");
  $dt = date("Y-m-d");
  $tm = date("H:i:s");

  echo $dt." ".$tm;

  $sql = "INSERT INTO MoneyCredited(MobileNo, Amount, Date, Time) VALUES ($mobNo,$amnt,'$dt','$tm')";
  $ch = mysqli_query($conn, $sql);

  $updtBal = "UPDATE Balance SET Bal = (Bal + $amnt)  WHERE MobileNo = $mobNo";
  mysqli_query($conn, $updtBal);


  if (!$ch) {
      die(mysqli_error($conn));
  } else {
      header('Location: ../Afterlogin.php');
      exit;
  }
  
  mysqli_close($conn);

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

session_start();

$mobNo= $_SESSION['regName'];
$not = "delete from Notification where MobileNoTo = $mobNo";
$query = mysqli_query($conn, $not);
if ($query) {
    header('Location: Notify.php');
    exit;
}

mysqli_close($conn);

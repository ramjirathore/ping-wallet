<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die(mysqli_error($conn));
}

$mobNo = $_POST["mobNo"];
$pass = $_POST["pass"];

$sql = 'select MobileNo, Password from signup';
$ch=mysqli_query($conn, $sql);
while ($row=mysqli_fetch_array($ch, MYSQLI_ASSOC)) {
    if ($mobNo == $row['MobileNo'] && $pass == $row['Password']) {
        session_start();

        $_SESSION['regName'] = $mobNo;
        header('Location: ../../Afterlogin.php');
        exit;

        break;
    } elseif ($mobNo == $row['MobileNo'] && $pass != $row['Password']) {
        echo "<script> alert('Wrong Password.Try Again!');
    	window.location.href='login.html';</script>";
    }
}

mysqli_close($conn);

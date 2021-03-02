<?php
        
session_start();

$name = "";
$email= "";
$aadhaar = "";
$servername = "localhost";
$username = "root";
$password = "";
$database = "E-wallet";
$conn = mysqli_connect($servername, $username, $password, $database);

//session_start();
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$confPass = $_POST['confPass'];
if ($newPass != $confPass) {
    echo "<script> alert('New password does not matches. Enter Again!');
  window.location.href='Profile.php';</script>";
} else {
    $mobNo = $_SESSION['regName'];
    $sql = 'select * from signup';
    $ch = mysqli_query($conn, $sql);

    while ($row=mysqli_fetch_array($ch, MYSQLI_ASSOC)) {
        if ($oldPass != $row['Password'] && $mobNo == $row['MobileNo']) {
            echo "<script> alert('You have given wrong password! TRY AGAIN!!');
window.location.href='Profile.php';</script>";
        } elseif ($mobNo == $row['MobileNo'] && $oldPass == $row['Password']) {
            $updt = "UPDATE `signup` SET `Password`='$newPass' WHERE `MobileNo` = $mobNo";
            $ch = mysqli_query($conn, $updt);

            if ($ch) {
                echo "<script> alert('Password changed!');
window.location.href='../Afterlogin.php';</script>";
            }
            break;
        }
    }
}

mysqli_close($conn);

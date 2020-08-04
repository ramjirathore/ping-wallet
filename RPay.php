<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm"; 
$conn = mysqli_connect($servername, $username, $password ,$database);

$amnt = $_POST['amnt'];

  session_start();
        $mobNo = $_SESSION['regName'];
        $mobNoTo = $_POST['mobileNoTo'];
        $amnt = $_POST['amnt'];
        $message = $_POST['message'];


        date_default_timezone_set("Asia/Kolkata");
        $dt = date("Y-m-d");
        $tm = date("H:i:s");
    
        $sql ="INSERT INTO `Notification`(`MobileNoFrom`, `MobileNoTo`, `Amount`, `Date`, `Time`, `Message`) VALUES ($mobNo, $mobNoTo, $amnt, '$dt', '$tm', '$message')";
        $ch = mysqli_query($conn,$sql);

        

        if(!$ch)
          die(mysqli_error($conn));
      else
         {
            header('Location: Afterlogin.php');
            exit;
         }

// while($row=mysqli_fetch_array($ch,MYSQLI_ASSOC))
// {
//   if($mobNo == $row['MobileNo'])
//   {
    
//     break;
//   }
// }
        mysqli_close($conn);
?>
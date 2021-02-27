<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
	die("failed");
}

$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$mob = $_POST["mobNo"];
$email = $_POST["email"];
$adhNo = $_POST["adhNo"];
$pass = $_POST["pass"];

if(!$mob)
	echo "<script> alert('Mobile Number is Required!');
    window.location.href='signup2.html';</script>";
 if(!$pass)
 	echo "<script> alert('Password is Required!');
    window.location.href='signup2.html';</script>";

$insert = "insert into signup values('$fName','$lName',$mob,'$email',$adhNo,'$pass')";
$bal ="insert into Balance values($mob,0)";
mysqli_query($conn, $bal);
if(mysqli_query($conn, $insert))
{
	header('Location: paytm.php');
	exit;
}
else
	die(mysqli_error($conn));
mysqli_close($conn);

?>
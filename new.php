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
else
	echo "success<br>";

$Name = $_POST["name"];
$mob = $_POST["mobNo"];
$pass = $_POST["pass"];

$insert = 'insert into test values("Hello",$mobNo,"$pass")';

if(mysqli_query($conn, $insert))
	echo "done!";
else
	die(msqli_error($conn));

?>
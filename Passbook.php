<!DOCTYPE html>
<html>
<head>
	<title>PASSBOOK</title>
	<style type="text/css">
		body{
			background-image: url('3.jpg');
		}
		table {
			border-collapse: collapse;
			width: 100%;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
		}
		th{
			color: white;
		}
		.cred th{
			background-color: green;

		} 
		.cred table{
			color: green;
		}
		.deb th{
			background-color: red;

		} 
		.deb table{
			color: red;
		}
		tr{
			background-color: white;
		}
		kbd{
			  font-family: monospace;
  			  font-size: 30px;
			  /*background-color: grey;*/
		}
		h4{
			text-align: center;

		}
		.cred kbd{
  			  color: green;
		}
		.deb kbd{
  			  color: red;
		}
	</style>
</head>
<body>

	<div class="cred"><h4><kbd><u>MONEY CREDITED</u></kbd></h4><br>
		
<table>
	<tr>
		<th>Amount</th>
		<th>Date</th>
		<th>Time</th>
		<th>Received By/From</th>
	</tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

// if(!$conn)
// {
// 	die("failed");
// }
// else
// 	echo "success<br>";
session_start();
$mobNo = $_SESSION['regName'];
$tableCred = "select * from MoneyCredited";
$cred = mysqli_query($conn, $tableCred);
while($row=mysqli_fetch_array($cred,MYSQLI_ASSOC))
{
	if($mobNo == $row['MobileNo'])
	{
		$dt = $row["Date"];
		$t =$row["Time"];
		$srch = "select MobileNo from MoneyDebited where `Date` = '$dt' and `Time` = '$t' ";
		$run = mysqli_query($conn, $srch);
		$value = mysqli_fetch_array($run);
		if($value)
			echo "<tr><td>".$row["Amount"]."</td><td>".$row["Date"]."</td><td>".$row["Time"]."</td><td>".$value[0]."</td></tr>";		
		else
		{
			echo "<tr><td>".$row["Amount"]."</td><td>".$row["Date"]."</td><td>".$row["Time"]."</td><td>"."Card"."</td></tr>";		
		}

	}
	
}
mysqli_close($conn);
?>
</table>
<br>
</div><br>
	<div class="deb"><h4><kbd><u>MONEY DEBITED</u></kbd></h4>

<table>
	<tr>
		<th>Amount</th>
		<th>Date</th>
		<th>Time</th>
		<th>Sent To</th>
	</tr>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);


$mobNo = $_SESSION['regName'];


$tableDebt = "select * from MoneyDebited";
$debt = mysqli_query($conn, $tableDebt);
while($row=mysqli_fetch_array($debt,MYSQLI_ASSOC))
{
	if($mobNo == $row['MobileNo'])
	{
		$dt = $row["Date"];
		$t =$row["Time"];
		$srch = "select MobileNo from MoneyCredited where `Date` = '$dt' and `Time` = '$t' ";
		$run = mysqli_query($conn, $srch);
		$value = mysqli_fetch_array($run);
		if($value)
			echo "<tr><td>".$row["Amount"]."</td><td>".$row["Date"]."</td><td>".$row["Time"]."</td><td>".$value[0]."</td></tr>";	
		else
			echo "<tr><td>".$row["Amount"]."</td><td>".$row["Date"]."</td><td>".$row["Time"]."</td><td>"."Recharge Done!"."</td></tr>";		

	}
}
mysqli_close($conn);

?>
<br><br>
</table>
</div>
</body>
</html>


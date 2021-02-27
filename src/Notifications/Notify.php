<!DOCTYPE html>
<html>
<head>
	<title>NOTIFICATIONS</title>
		<style type="text/css">
		body{
			background-image: url('../assets/noti.jpg');
			background-size: auto;                      
    		background-repeat:   no-repeat;
    		/*background-position: center center;*/
		}
		.cred h4, .bgt{
			  font-family: monospace;
  			  font-size: 40px;
  			  color: #ffffff;
			  margin-top: 30px;
			  margin-bottom: 30px;
			  margin-right: 0px;
			  margin-left: 0px;
			  padding: 0px;
			  text-align: center;
		}
		.cred kbd{
			width: 120px;
		}
		.bgt{
			background-color: coral;
		}
		.buton{
			margin-bottom: 6px;
			margin-top: 1px;
			padding: 0px;
			color: coral;

		}
		
	</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
	.bs-example{
    	margin-left: 80px;
    	margin-right: 80px;
    }
</style>
</head>
<body>
	<div class="cred row">
		<div class ="col-sm-10">
			<h4><div class="bgt"><strong>REQUESTS</strong></div></h4>
		</div>
		<div class="col-sm-2">
			<h4><div class="bgt2"><a href="../Afterlogin.php"><button type="button" class="btn buton btn-info btn-lg">Go Back</button></a>
			<a href="deleteNoti.php"><button type="button" class="btn buton btn-danger btn-lg">Clear All</button></a></div></h4>
		</div>
	</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm";
$conn = mysqli_connect($servername, $username, $password, $database);

$name = "";
$message="";
$dt = "";
$tm = "";
$amount = "";

session_start();
	$mobNo= $_SESSION['regName'];
	$not = "select * from Notification order by Time desc";
	$query = mysqli_query($conn, $not);
	$count = 0;
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	if($mobNo == $row['MobileNoTo'])
	{
		$dt = $row["Date"];
		$tm =$row["Time"];
		$message = $row['Message'];
		$amount = $row['Amount'];

		$mobFrom = $row["MobileNoFrom"];
		
		$srch = "select FirstName from signup where `MobileNo` = $mobFrom";
		$run = mysqli_query($conn, $srch);
		$value = mysqli_fetch_array($run);

		$name = $value[0];

		if(!$count)
		{
			$html = '<div class="bs-example"> 
    				<div class="alert alert-info alert-dismissible fade show">
	        			<strong>New!</strong> '.$name." has requested Rs ".$amount." from you at ".$tm." on ".$dt."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Message: ".$message.'
	        			<button type="button" class="close" data-dismiss="alert">&times;</button>
	    			</div>
				</div>';
			echo $html;
		}
		else
		{
			$html = '<div class="bs-example"> 
    				<div class="alert alert-warning alert-dismissible fade show">'.$name." has requested Rs ".$amount." from you at ".$tm." on ".$dt."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Message: ".$message.'
	        			<button type="button" class="close" data-dismiss="alert">&times;</button>
	    			</div>
				</div>';
			echo $html;
		}
		$count = 1;
	}
	
}
mysqli_close($conn);
?>
</body>
</html>                            
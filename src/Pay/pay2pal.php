	<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm"; 
$conn = mysqli_connect($servername, $username, $password ,$database);

$amnt = $_POST['amnt'];
$mobNoTo = $_POST['mobNo'];
$pass = $_POST['pass']; 
        session_start();
        $mobNoFrom = $_SESSION['regName'];
        
        $sql1 = "SELECT MobileNo, Password from signup WHERE MobileNo = $mobNoFrom AND Password = '$pass'";
        $query=mysqli_query($conn,$sql1);

        $tellBal = "SELECT `Bal` from Balance WHERE MobileNo = $mobNoFrom";
        $queryBal = mysqli_query($conn, $tellBal);
        $row = mysqli_fetch_array($queryBal);
        $Bal = $row[0];
        

        if($query && $mobNoTo != $mobNoFrom && $Bal > $amnt)
        {
            $check = "SELECT MobileNo from signup WHERE MobileNo = $mobNoTo";
            if(mysqli_query($conn, $check))
            {
                date_default_timezone_set("Asia/Kolkata");
                $dt = date("Y-m-d");
                $tm = date("H:i:s");

                // To this number
                $sqlTo = "INSERT INTO MoneyCredited VALUES ($mobNoTo,$amnt,'$dt','$tm')";
                mysqli_query($conn,$sqlTo);

                $updtBalTo = "UPDATE Balance SET Bal = (Bal + $amnt)  WHERE MobileNo = $mobNoTo";
                mysqli_query($conn,$updtBalTo);

                // From this number
                $sqlTo = "INSERT INTO MoneyDebited VALUES ($mobNoFrom,$amnt,'$dt','$tm')";
                mysqli_query($conn,$sqlTo);

                $updtBalFrom = "UPDATE Balance SET Bal = (Bal - $amnt)  WHERE MobileNo = $mobNoFrom";
                mysqli_query($conn,$updtBalFrom);
                echo "<script> alert('Payment Successful!');
                window.location.href='../Afterlogin.php';</script>";

            }
            
        }
        else if($query && $mobNoTo != $mobNoFrom && $Bal < $amnt)        
        {
                echo "<script> alert('Unsufficient Balance! Payment Denied.'); alert('Please Add money to Pay!');
                window.location.href='Addmoney.php';</script>";   
        }
        else if($mobNoTo == $mobNoFrom)        
        {

                echo "<script> alert('Cant Pay to yourself! Payment Denied.');
                window.location.href='pay.php';</script>";   
        }
        else
            die(mysqli_error($conn)." 1");

        mysqli_close($conn);
?>
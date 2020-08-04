  <?php
        session_start();

      $name = "";
      $email= "";
      $aadhaar = "";
$servername = "localhost";
$username = "root";
$password = "";
$database = "Paytm"; 
$conn = mysqli_connect($servername, $username, $password ,$database);

  //session_start();
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];

        $mobNo = $_SESSION['regName'];
        $sql = 'select * from signup';
        $ch = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($ch,MYSQLI_ASSOC))
{
  if($mobNo == $row['MobileNo'])
  {
     $updt = "UPDATE `signup` SET `FirstName`='$firstName',`LastName`='$lastName',`Email`='$email' WHERE `MobileNo` = $mobNo";
     $ch = mysqli_query($conn,$updt);

     if($ch)
      echo "<script> alert('Details Changed!');
    window.location.href='Afterlogin.php';</script>";
    break;
  }
 
}
        mysqli_close($conn);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../AddOn/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../../AddOn/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PROFILE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
  <link href="../../AddOn/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../AddOn/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
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

        $mobNo = $_SESSION['regName'];
        $sql = 'select * from signup';
        $ch = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($ch,MYSQLI_ASSOC))
{
  if($mobNo == $row['MobileNo'])
  {
    $name = $row['FirstName'].' '.$row['LastName'];
    $email = $row['Email'];
    $aadhaar = $row['Aadhaar'];
    break;
  }
}
        mysqli_close($conn);
       // $mobNo = $_SESSION['regName'];

?>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #ffffff;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  font-color: #ffffff;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #55d4c5;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  background-color: #212020;
  background-color: #212020;

}
label{
  color: #ffffff;
}
h6{
  text-align: left;
}
kbd{
  font-family: monospace;
  font-size: 20px;
  background-color: #000000;
}

</style>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('../../AddOn/img/wizard.jpg')">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Personal Info')">Personal Info</button>
  <button class="tablinks" onclick="openCity(event, 'Change Password')">Change Password</button>
  <button class="tablinks" onclick="openCity(event, 'Edit Profile')">Edit Profile</button>
</div>

<div id="Personal Info" class="tabcontent">
  <h6><kbd>NAME:&nbsp;&nbsp;<?php echo $name; ?></kbd></h6>
  <h6><kbd>MOBILE NUMBER:&nbsp;&nbsp;<?php echo $mobNo; ?></kbd></h6>
  <h6><kbd>EMAIL:&nbsp;&nbsp;<?php echo $email; ?></kbd></h6>
  <h6><kbd>AADHAR NUMBER:&nbsp;&nbsp;<?php echo $aadhaar; ?></kbd></h6>

</div>

<div id="Change Password" class="tabcontent">
<div class="row container">
    <form action="ProfileCheckOldpass.php" method="POST">
    <br>
      <div class="col-sm-8 col-sm-offset-6">
          <div class="form-group">
               <label>Old Password <small>*</small></label>
                    <input name="oldPass" type="Password" class="form-control">
          </div>
          <div class="form-group">
               <label>New Password <small>*</small></label>
                    <input name="newPass" type="Password" class="form-control">
          </div>
      </div>

      <div class="col-sm-8 col-sm-offset-6">
          <div class="form-group">
                <label>Confirm Password <small>*</small></label>
                     <input name="confPass" type="Password" class="form-control">
          </div>
          <div class="col-sm-4 col-sm-offset-4">
          <br>
               <input type="submit" onclick = "alert('Are you sure?')" class="btn btn-sm btn-info btn-block btn-primary active" value="CHANGE">
          </div>       
      </div>
    </form>
  </div>
      <br>
</div>

<div id="Edit Profile" class="tabcontent"> 
  <div class="row container">
    <form action="ProfileEditDetails.php" method="POST">
    <br>
      <div class="col-sm-8 col-sm-offset-6">
          <div class="form-group">
               <label>First Name <small>*</small></label>
                    <input name="firstName" type="text" class="form-control" placeholder="Ramji...">
          </div>
          <div class="form-group">
               <label>Last Name <small>*</small></label>
                    <input name="lastName" type="text" class="form-control" placeholder="Rathore...">
          </div>
      </div>

      <div class="col-sm-8 col-sm-offset-6">
          <div class="form-group">
                <label>Email <small>*</small></label>
                     <input name="email" type="email" class="form-control" placeholder="rmjrathore@gmail.com">
          </div>
          <div class="col-sm-4 col-sm-offset-4">
          <br>
                <a href = "edit.php"><input type="submit" class="btn btn-sm btn-info btn-block btn-primary active" value="CHANGE"></a>
          </div>       
      </div>
    </form>
  </div>
      <br>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</div> <!--  big container -->

</body>

	<!--   Core JS Files   -->
	<script src="../../AddOn/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../../AddOn/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../AddOn/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../../AddOn/js/gsdk-bootstrap-wizard.js"></script>

	<script src="../../AddOn/js/jquery.validate.min.js"></script>

</html>

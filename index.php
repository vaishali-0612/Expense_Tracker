<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="css/datepicker3.css" rel="stylesheet"> -->
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	
</head>
<body>

	<div class="row">
			<h2 align="center">Daily Expense Tracker</h2>

		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="wrapper">
				<div class="title">Log in</div>
				<div class="panel-body">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
					<form role="form" action="" method="post" id="" name="login">
						<fieldset>

							<div class="row">
							    <i class="fas fa-user" id="icon1"></i>
								<input class="text" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
							</div>
							
							<div class="row">
							    <i class="fas fa-lock" id="icon2"></i>
								<input class="password" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="pass"><a href="forgot-password.php">Forgot Password?</a></div>

							<div class="row button">
								<button type="submit" value="login" name="login" class="btn btn-primary">login</button><span style="padding-left:250px">
								</span>
							</div>

							<div class="signup-link">
								Not a member? <a href="register.php">Register</a>
							</div>

							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

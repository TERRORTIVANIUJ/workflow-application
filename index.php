<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin/User Login</title>
</head>

<body>

<style>
	body {
		background: linear-gradient(#00b16a, rgba(0, 0, 0, 0.5), #33b5e5), url(assets/img/banner.jpg) !important;
		background-size: cover !important;
		backdrop-filter: blur(5px) !important;
	}
</style>

<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
include("include/login_header.php");

?>

<style>
	
</style>

<div class="row">
	<div class="col-md-4 col-md-offset-3">
		<!-- LOGO goes here -->
		<center><h2 style="margin-top:1px;"></h2></center>
		<!-- LOGO goes here -->
		<div class="well" style="position:relative;top:20vh;">
			<form class="form-horizontal form-custom-login" action="" method="POST">
			  <div class="form-heading" style="background: transparent;">
			    <h2 class="text-center" style="font-weight: bold; font-size: 30px; color: #000;">Login</h2>
				<hr style="border: 5px solid #00b16a;">
			  </div>
			  
			  <?php if(isset($info)){ ?>
			  <h5 class="alert alert-danger"><?php echo $info; ?></h5>
			  <?php } ?>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Username" name="username" required/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required/>
			  </div>
			  <button type="submit" name="login_btn" class="btn btn-info pull-right" style="border: 0; border-radius: 10px;">Sign In</button>
			</form>
		</div>
	</div>
</div>


<?php

include("include/footer.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>


<div class="video">
	<div class="col-md-4 col-md-offset-3">
		<!-- LOGO goes here -->
		<!-- <center><h2 style="margin-bottom:1px;"></h2></center> -->
		<!-- LOGO goes here -->
		<div class="well" style="position:relative;bottom:-100vh;">
			 <div class="form-heading" style="background: transparent;">
			    <!-- <h3 class="text-center" style="font-weight: bold; font-size: 40px; color: #000;">Workflow Management System </h4>
				<hr style="border: 4px solid #black;"> -->
			  <p>Watch a Mini Video Demonstration of the application services, and the how the application can help optimise the work-flow within an organisation.</p>
     <!-- Use a button to pause/play the video with JavaScript -->
     <button id="myBtn" onclick="myFunction()">Pause</button>
   </div>
<div class="content">
<video autoplay muted loop id="Video">
<source src="Video.mp4" type="video/mp4">
</video>



<script>
// Get the video
var video = document.getElementById("Video");

// Get the button
var btn = document.getElementById("myBtn");

// Pause and play the video section
function myFunction() {
if (video.paused) {
 video.play();
 btn.innerHTML = "Pause";
} else {
 video.pause();
 btn.innerHTML = "Play";
}
}
</div>
</div>
</div>
</script>
</section>
</body>
</html>
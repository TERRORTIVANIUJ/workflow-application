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

	.iframe-container{
		position: relative;
		width: 100%;
		padding-bottom: 56.25%; 
		height: 0;
	}
	.iframe-container iframe{
		position: absolute;
		top:0;
		left: 0;
		width: 100%;
		height: 100%;
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

<div class="row">
	<div class="col-md-4 col-md-offset-3">
		<!-- LOGO goes here -->
		<center><h2 style="margin-top:1px;"></h2></center>
		<!-- LOGO goes here -->
		<div class="">
			<div class="iframe-container">
			<iframe width="1000" height="400" src="https://www.youtube.com/embed/ly36kn0ug4k" title="YouTube video player" frameborder="0" 
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
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
</div>


<?php

include("include/footer.php");

?>

	
</body>
</html>


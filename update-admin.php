<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Update</title>
  <link rel="icon" href="assets/img/icon.jpg">
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
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}


$admin_id = $_GET['admin_id'];

if(isset($_POST['update_current_user'])){
    $obj_admin->update_admin_data($_POST,$admin_id);
}

if(isset($_POST['btn_user_password'])){
    $obj_admin->update_user_password($_POST,$admin_id);
}

$sql = "SELECT * FROM tbl_admin WHERE user_id='$admin_id' ";
$info = $obj_admin->manage_all_info($sql);
$row = $info->fetch(PDO::FETCH_ASSOC);
             
$page_name="Admin";
include("include/sidebar.php");

?>


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <ul class="nav nav-tabs nav-justified nav-tabs-custom">
            <li><a href="manage-admin.php">Manage Admin</a></li>
            <li><a href="admin-manage-user.php">Manage User</a></li>
          </ul>
          <div class="gap"></div>

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="well">
                <h3 class="text-center" style="font-weight: bold; font-size: 30px;">Edit Admin</h3>
                    <hr style="border: 5px solid #33b5e5;"><br>
                      <div class="row">
                        <div class="col-md-7">
                          <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
                              <label class="control-label col-sm-2">Fullname</label>
                              <div class="col-sm-8">
                                <input type="text" value="<?php echo $row['fullname']; ?>" placeholder="Enter User's Name" name="em_fullname" list="expense" class="form-control input-custom" id="default" required>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="control-label col-sm-2">Username</label>
                              <div class="col-sm-8">
                                <input type="text" value="<?php echo $row['username']; ?>" placeholder="Enter User's username" name="em_username" class="form-control input-custom" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2">Email</label>
                              <div class="col-sm-8">
                                <input type="email" value="<?php echo $row['email']; ?>" placeholder="Enter User's Email" name="em_email" class="form-control input-custom" required>
                              </div>
                            </div>
                      
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-3">
                                <button type="submit" name="update_current_user" class="btn btn-success-custom">Update Now</button>
                              </div>
                            </div>
                          </form> 
                        </div>
                        <div class="col-md-5">
                          <a href="admin-password-change.php?admin_id=<?php echo $row['user_id'];?>">Change Password</a>
                          
                          
                        </div>
                      </div>

              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>


<?php

include("include/footer.php");

?>

  
</body>
</html>


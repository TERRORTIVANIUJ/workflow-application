 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notification</title>
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

// check admin
$user_role = $_SESSION['user_role'];




$page_name="Edit Task";
include("include/sidebar.php");


?>
<!-- Manage Notification email -->

<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

$massage = '';
 

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$status = $_POST['status'];

// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer(); 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;           //Enable verbose debug output 
$mail->isSMTP();                                   // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                            // Enable SMTP authentication 
$mail->Username = 'terror.tivani@gmail.com';       // SMTP username 
$mail->Password = 'hqyrjsfttuvrsapq';                   // SMTP password 
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587 ;                                 // TCP port to connect to 
 
// Sender info 
$mail->setFrom('terror.tivani@gmail.com', 'SenderName'); 
$mail->addReplyTo('reply@example.com', 'SenderName');
 
// Add a recipient 
$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Task Manage'; 
 
// Mail body content 

<<<<<<< HEAD
$bodyContent = "<p>Hey there,<br>Your have a task that is <strong>$status</strong>.
                <br>Please log in <a href='https://workflow-application.herokuapp.com/index.php' target='_blank'>here</a> and make approriate changes to this reference.<br>Regards.</p>"; 
$bodyContent .= "<p>This email is sent by <b>Admin</b></p>"; 
=======
$bodyContent = "<p>Hi there,<br><br>You have a task that is <strong>$status</strong>.<br>Please log in 
                <a href='https://workflow-application.herokuapp.com/index.php' target='_blank'>here</a> 
                and make approriate changes to this reference.<br><br>Regards.</p>"; 
$bodyContent .= "<p>This email is sent by the <b>Admin</b></p>"; 
>>>>>>> 02e3dda5a915f2549744d1ddd1898e374675e342
$mail->Body    = $bodyContent; 

// Send email 
if(!$mail->send()) { 
    $massage = 'Notification NOT sent !!'; 
} else { 
    $massage = 'Notification sent !!'; 
}

//closing stmp connection
$mail->smtpClose();


}
?>

<!--modal for employee add-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="well">
                <h3 class="text-center" style="font-weight: bold; font-size: 30px;"><?php if(!$massage){
                                                                                echo "Notification";
                                                                              }else{
                                                                                echo $massage;
                                                                              }?>
                </h3>
                  <hr style="border: 5px solid #33b5e5;"><br>
                      <div class="row">
                        <div class="col-md-12">
                          <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
			                    <label class="control-label col-sm-4">Email</label>
			                    <div class="col-sm-6">
			                      <input type="text" name="email" placeholder="Enter Notifying Email" id="task_id"  class="form-control input-custom" <?php if($user_role != 1){ ?> readonly <?php } ?> val required>
			                    </div>
			                  </div>

			                   <div class="form-group">
			                      <label class="control-label col-sm-4">Status</label>
			                    <div class="col-sm-6">
									          <input type="text" name="status" placeholder="Enter Status" class="form-control input-custom">
			                    </div>
			                    </div>
                            
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-3">
                                <button type="submit" name="submit" class="btn btn-success-custom">Notify</button>
                              </div>
                              <div class="col-sm-3">
                                <a title="Update Task"  href="task-info.php"><span class="btn btn-danger-custom btn-xs">Cancel</span></a>
                              </div>
                            </div>
                          </form> 
                        </div>
                      </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script type="text/javascript">
	  flatpickr('#t_start_time', {
	    enableTime: true
	  });

	  flatpickr('#t_end_time', {
	    enableTime: true
	  });

	</script>


<?php

include("include/footer.php");

?>



</body>
</html>


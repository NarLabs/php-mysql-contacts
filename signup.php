<?php
include 'html/header.php'
?>

<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!=""){
 $reg_user->redirect('contacte/index.php');
}


if(isset($_POST['btn-signup'])){
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $code = md5(uniqid(rand()));
 $error = FALSE;
 
 include 'util/validate_signup.php';
 
  if (!$error) {
	$stmt = $reg_user->runQuery("SELECT * FROM users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	if($stmt->rowCount() > 0){
	$msg = "
        <div>    
     <strong>Sorry !</strong>  email allready exists , Please Try another one
     </div>
     ";
 }
 else{
  if($reg_user->register($uname,$email,$upass,$code)){   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $uname,
      <br /><br />
      Welcome to your online ContactsBook!<br/>
      To complete your registration  please  click following link<br/>
      <br /><br />
      <a href='http://www.contactsbook.xyz/verify.php?id=$id&code=$code'>CLICK HERE TO ACTIVATE YOUR ACCOUNT</a>
      <br /><br />
	  If you're having trouble clicking the password reset link, copy and paste the URL below into your web browser. <hr />
	   http://www.contactsbook.xyz/resetpass.php?id=$id&code=$code
      Thanks,";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($email,$message,$subject); 
   $msg = "
     <div>      
      <strong>Success!</strong> We've sent an email to the following address: $email <br />
                    Please click on the confirmation link in the email to create your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Query could no execute...";
  }  
 }
}
}
?>

<?php
include 'html/signup_form.php'
?>

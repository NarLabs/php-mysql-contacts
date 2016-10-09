<?php
include 'html/header.php'
?>

<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
 $email = $_POST['txtemail'];
 
 $stmt = $user->runQuery("SELECT userID FROM users WHERE userEmail=:email LIMIT 1");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['userID']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->runQuery("UPDATE users SET tokenCode=:token WHERE userEmail=:email");
  $stmt->execute(array(":token"=>$code,"email"=>$email));
  
  $message= "
       Hello, $email
       <br /><br />
	   You recently requested to reset your password for your ContactsBook account.
       
       <br /><br />
       Click the following link to reset your password 
       <br /><br />
       <a href='http://www.contactsbook.xyz/resetpass.php?id=$id&code=$code'>RESET YOUR PASSWORD</a>
       <br /><br />
       If you did not request a password reset, please ignore this email or reply to let us know. 
       If you're having trouble clicking the password reset link, copy and paste the URL below into your web browser. <hr />
	   http://www.contactsbook.xyz/resetpass.php?id=$id&code=$code
	  ";
  $subject = "Password Reset";
  
  $user->send_mail($email,$message,$subject);
  
  $msg = "<div>     
     We've sent an email to the following address: $email <br />
                    Please click on the password reset link in the email to reset your password. 
      </div>";
 }
 else
 {
  $msg = "<div>     
     <strong>Sorry,</strong>  this email was not found! 
       </div>";
 }
}
?>

<?php
include 'html/fpass_form.php'
?>


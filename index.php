<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!=""){
 $user_login->redirect('contacte/index.php');
}

if(isset($_POST['btn-login'])){
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtupass']);
 
 if($user_login->login($email,$upass)) {
  $user_login->redirect('contacte/index.php');
 }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login | ContactsBook</title> 
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/validateUser.js"></script>	     	
  </head>
  <body>
    <div>
  <?php 
  if(isset($_GET['inactive']))
  {
   ?>            
    <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
   </div>
            <?php
  }
  ?>
        
        <?php
        if(isset($_GET['error']))
  {
   ?>

    
    <strong>Wrong Details!</strong> 
	
            <?php
  }
  ?>
  
  <div class="center">
        <h2>Sign In</h2><hr />		
		
			<form method="post">
				<input name="comanda" type="hidden" value="login" onsubmit="return validateLogin()" />
			
					<input type="text" placeholder="Email address" name="txtemail"  required/><br/>
					<input type="password" placeholder="Password" name="txtupass" required/><hr/>			
					<input href="contacte/index.php" type="submit" name="btn-login" value="Login"/>
			</form>
			
			<div>
				<a href="signup.php" ><button class="butonEtc">Register</button></a>
				<a href="fpass.php" ><button class="butonEtc">Lost your password?</button></a>
			</div>
			
	</div>
		
<div id="footer">Copyright&nbsp;&copy&nbsp;2016&nbsp;AnonyBit Co.&nbsp;All rights reserved.</div>        
  </body>
</html>

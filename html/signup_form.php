<title>Signup | ContactsBook</title> 	
</head>

  <body>
    <div>
    <?php if(isset($msg)) echo $msg;  ?>
	<div class="center">
      <form name="signup_form" id="signup_form" method="post" onsubmit="return validateUser()">
        <h2>Sign Up</h2><hr />
        <input type="text" placeholder="Username" name="txtuname" />
        <input type="text" placeholder="Email address" name="txtemail" />
	<input type="text" placeholder="Confirm email address" name="c_email" />
        <input type="password" placeholder="Password" name="txtpass" />
	<input type="password" placeholder="Confirm password" name="c_pass" />
      <hr />
        <input type="submit" name="btn-signup" value="Sign Up" /><br />
      </form>
	<a href="index.php"><button class="butonEtc">Back to login</button></a>
	  </div>

    </div>     
  </body>
</html>

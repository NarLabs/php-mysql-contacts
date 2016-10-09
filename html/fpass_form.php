<title>Forgot Password | ContactsBook </title>
</head>

<body id="login">
    
<div class="center">
      <form method="post">
        <h2>Forgot Password</h2><hr />
        
         <?php
   if(isset($msg))
   {
    echo $msg;
   }
   else
   {
    ?>
         
		Please enter your email address. You will receive a link to create a new password via email.
		
                <?php
   }
   ?>
        
        <input type="text" placeholder="Email address" name="txtemail" required />
      <hr />
        <input type="submit" name="btn-submit" value="Send password reset email" />
      </form>
			<a href="index.php"><button class="butonEtc">Back</button></a>
		</div>
    
  </body>
</html>

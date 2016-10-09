<title>Password Reset | ContactsBook</title>    
</head>
  <body>
    <div>
     <div>
   <strong>Hello !</strong>  <?php echo $rows['userName'] ?> you are here to reset your forgetton password.
  </div>
  <div class="center">
        <form method="post">
        <h3>Password Reset.</h3><hr />
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>
        <input type="password" placeholder="New Password" name="pass" required />
        <input type="password" placeholder="Confirm New Password" name="confirm-pass" required />
      <hr />
        <input type="submit" name="btn-reset-pass" value="Reset Your Password" />
        
      </form>
	<a href="index.php"><button class="butonEtc">Cancel</button></a>
	  </div>

    </div> 
  </body>
</html>

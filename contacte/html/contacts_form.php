<div class="center">
    <div>
      <div>
        <h3><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New Contact</h3>
      </div>
      <div>

        <form name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="process_form.php" onsubmit="return validateForm()">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >          
          <input type="hidden" name="cid" value="<?php echo intval($results[0]["id"]); ?>" 
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
            <div>
              <label for="first_name"><span class="required">*</span>First Name:</label>
              <div>
                <input type="text" value="<?php echo $results[0]["first_name"] ?>" placeholder="First Name" id="first_name" name="first_name"><span id="first_name_err" class="error"></span>
              </div>
            </div>
            
            <div>
              <label for="last_name"><span class="required">*</span>Last Name:</label>
              <div>
                <input type="text" value="<?php echo $results[0]["last_name"] ?>" placeholder="Last Name" id="last_name" name="last_name"><span id="last_name_err" class="error"></span>
              </div>
            </div>
            
            <div>
              <label for="phone_nr"><span class="required">*</span>Phone Number:</label>
              <div>
                <input type="text" value="<?php echo $results[0]["phone_nr"] ?>" placeholder="Contact Number" id="phone_nr"  name="phone_nr"><span id="phone_nr_err" class="error"></span>                
              </div>
            </div>

			<div>
              <label for="email"><span class="required">*</span>Email:</label>
              <div>
                <input type="text" value="<?php echo $results[0]["email"] ?>" placeholder="Email" id="email" name="email"><span id="email_err" class="error"></span>
              </div>
            </div>			
            
            <?php if ($_GET["m"] == "update") ?>                      
          
            
            <div>              
                <input type="submit" value="Submit" /> 
             </div>
          
        </form>
	<a href="index.php"><button class="butonEtc">Cancel</button></a>
      </div>
    </div>
  </div>


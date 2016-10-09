<?php

require 'config.php';
$mode = $_REQUEST["mode"];

if ($mode == "add_new" ) {
  $first_name = trim($_POST['first_name']); 
  $last_name = trim($_POST['last_name']);
  $email = trim($_POST['email']);
  $phone_nr = trim($_POST['phone_nr']);   
  $owner = $_SESSION['userSession'];
  $error = FALSE;

  include '../util/validate_contacts.php';
  
  if (!$error) {
    $sql = "INSERT INTO `contacts` (`first_name`,  `last_name`, `phone_nr`, `email`, `owner`) 
	VALUES " . "( :fname, :lname, :phone_nr, :email, :owner )";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);      
      $stmt->bindValue(":lname", $last_name);     
      $stmt->bindValue(":phone_nr", $phone_nr);      
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":owner", $owner);
     
      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact added successfully.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Failed to add contact.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } 
  header("location:index.php");
} elseif ( $mode == "update_old" ) {
  
  $first_name = trim($_POST['first_name']);  
  $last_name = trim($_POST['last_name']);  
  $phone_nr = trim($_POST['phone_nr']); 
  $email = trim($_POST['email']);
  $cid = trim($_POST['cid']);
  $owner = $_SESSION['userSession'];  
  $error = FALSE;

   include '../util/validate_contacts.php';

  if (!$error) {
    $sql = "UPDATE `contacts` SET `first_name` = :fname, `last_name` = :lname, `phone_nr` = :phone_nr, `email` = :email, `owner` = :owner "
            . "WHERE id = :cid ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);      
      $stmt->bindValue(":lname", $last_name);     
      $stmt->bindValue(":phone_nr", $phone_nr);    
      $stmt->bindValue(":email", $email);    
      $stmt->bindValue(":cid", $cid);
      $stmt->bindValue(":owner", $owner);
      

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to contact.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  }
  header("location:index.php?pagenum=".$_POST['pagenum']);
} elseif ( $mode == "delete" ) {
   $cid = intval($_GET['cid']);
   
   $sql = "DELETE FROM `contacts` WHERE id = :cid";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":cid", $cid);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete contact.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:index.php?pagenum=".$_GET['pagenum']);
}
?>

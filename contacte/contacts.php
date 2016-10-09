<?php
include 'html/header.php';
include 'login.php'
?>

<?php
require_once 'config.php';

try {
   $sql = "SELECT * FROM contacts WHERE 1 AND id = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<?php
include 'html/contacts_form.php'
?>


<?php
include 'html/footer.php'
?>

 

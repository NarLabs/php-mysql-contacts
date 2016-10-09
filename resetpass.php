<?php
include 'html/header.php'
?>



<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM users WHERE userID=:uid AND tokenCode=:token");
 $stmt->execute(array(":uid"=>$id,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['pass'];
   $cpass = $_POST['confirm-pass'];
   
   if($cpass!==$pass)
   {
    $msg = "<div>      
      <strong>Sorry!</strong>  Password Doesn't match. 
      </div>";
   }
   else
   {
    $stmt = $user->runQuery("UPDATE users SET userPass=:upass WHERE userID=:uid");
    $stmt->execute(array(":upass"=>md5($cpass),":uid"=>$rows['userID']));
    
    $msg = "<div>     
      Password Changed.
      </div>";
    header("refresh:2;index.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>
<?php
include 'html/resetpass_form.php'
?>

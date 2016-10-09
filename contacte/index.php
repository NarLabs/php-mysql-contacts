<?php
include 'login.php'
?>

<?php
require_once 'config.php';
include 'html/header.php';

if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;

    $owner = $_SESSION['userSession'];
	
try {
    $sql = "SELECT * FROM contacts WHERE owner=:owner ORDER BY first_name ";
    $stmt = $DB->prepare($sql);	
    $stmt->execute(array(':owner' => $owner));
    $results = $stmt->fetchAll();

} catch (Exception $ex) {
  echo $ex->getMessage();
}


?>
<div>

  <div>    
    <div>
	
		
     
<?php if (count($results) > 0) { ?>
        <div>
          <table>
            <tbody><tr>               
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone Number</th>
					<th>Email </th>
					<th>Action </th>
              </tr>
  <?php foreach ($results as $res) { ?>
                <tr>                  
                  <td><?php echo $res["first_name"]; ?></td>
                  <td><?php echo $res["last_name"]; ?></td>
                  <td><?php echo $res["phone_nr"]; ?></td>
                  <td><?php echo $res["email"]; ?></td>
                  <td>                    
                    <a href="contacts.php?m=update&cid=<?php echo $res["id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="butonVerde"> Edit</button></a>&nbsp;
                    <a href="process_form.php?mode=delete&cid=<?php echo $res["id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><button class="butonRosu">Delete</button></a>&nbsp;
                  </td>
                </tr>
  <?php } ?>
            </tbody></table>
        </div>
        <div>
          <ul>
  <?php
  //Show page links
  for ($i = 1; $i <= $last; $i++) {
    if ($i == $pagenum) {
      ?>
                <li><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                <?php
              } else {
                ?>
                <li><a href="index.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                <?php
              }
            }
            ?>
          </ul>
        </div>

          <?php } else { ?>
        <div>No contacts found.</div>
<?php } ?>
    </div>
  </div>
</div>

<?php
include 'html/footer.php'
?>

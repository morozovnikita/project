<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



require("../config/db.php");

$sql = "SELECT * FROM blog";
$result = mysqli_query($con , $sql);








?>
<?php require("../include/header.php"); ?>
<?php  while($row = mysqli_fetch_array($result)){ ?>

<?php } ?>
<?php require("../include/footer.html"); ?>
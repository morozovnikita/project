
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require("../config/db.php");


$id = htmlspecialchars(trim((preg_replace("/[^,.0-9]/", '',$_GET['id']))));


$sql = "SELECT * FROM blog WHERE id = '$id'";
$query = mysqli_query($con , $sql);
$data = array();


$row = mysqli_fetch_assoc($query);





?>



<?php require("../include/header.php"); ?>

<div class="container">
  <form action="user.php" method="POST">
    <div class="form-group">
    	<h1><?=$row['title'];?></h1>
		<p><?=$row['text'];?></p>
  </form>
</div>





<?php require("../include/footer.html"); ?>





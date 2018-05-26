<?php

require("config/db.php");

if(isset($_POST['send'])){
	$username = $_POST['username'];
	$name = $_POST['name'];

	if(!empty($username && $name)){
		$sql = "INSERT INTO form(username , name) VALUES('$username' , '$name')";

		$query = mysqli_query($db , $sql);

		if($query){
			?>
				
			<?php
		}
	}
}

?>


<?php require("include/header.php"); ?>


<?php require("include/footer.php"); ?>
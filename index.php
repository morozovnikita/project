<?php

require("config/db.php");
if(isset($_POST['send'])){
	$username = $_POST['username'];
	$name = $_POST['name'];

	if(!empty($username && $name)){
		$sql = "INSERT INTO form(username , name) VALUES('$username' , '$name')";

		$query = mysqli_query($con , $sql);

		if($query){
			?>
				<div class="alert alert-success" role="alert">
				  Form was sent!
				</div>
			<?php
		}
	}
}

var_dump($_SESSION);

?>

<?php require("include/header.php"); ?>

  	<div class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ab necessitatibus at porro fugit veniam molestias doloremque ratione ullam laborum, alias voluptatem, in vel optio dolore nobis. Debitis, quo, repudiandae.</p>
  	</div>
<?php require("include/footer.html");
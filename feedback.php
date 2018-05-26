<?php

require("config/db.php");
if(isset($_POST['send'])){
	$name = htmlspecialchars(trim($_POST['name']));
	$email = htmlspecialchars(trim($_POST['email']));
	$text = htmlspecialchars($_POST['text']);

	if(!empty($name && $email && $text)){
		$sql = "INSERT INTO feedback(name , email , text) VALUES('$name' , '$email' , '$text')";

		$query = mysqli_query($con , $sql);

		if($query){
			?>
				<div class="alert alert-success" role="alert">
				  Form was sent!
				</div>
			<?php
		}
	}else {
		?>
			<div class="alert alert-danger" role="alert">
				Fill in all the fields!!!
			</div>
		<?php
	}
}



?>

<?php require("include/header.php"); ?>

  	<div class="container">
    <form action="feedback.php" method="POST">
	  <div class="form-group">
	    <label>Email</label>
	    <input type="email" class="form-control" name="email" placeholder="Email">

	    <label>Name</label>
	    <input type="text" class="form-control" name="name" placeholder="Name"><br>

	     <div class="form-group">
		  <label for="comment">Text:</label>
		  <textarea class="form-control" rows="5" name="text" id="comment"></textarea>
		</div>


	    <input type="submit" class="btn btn-primary" name="send" value="Send">
	    <a href="/" class="btn btn-primary">Back</a>
	  </div>
	</form>
  	</div>
<?php require("include/footer.html");
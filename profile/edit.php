<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require("../config/db.php");

$id = $_SESSION['user_id'];



$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($con , $sql);
$data = array();
$row = mysqli_fetch_assoc($query);
$login = $row['login'];



if(isset($_POST['change'])){
	$new_login = $_POST['login'];
	if($new_login != $login){
		$sql = "UPDATE  users SET login = '$new_login' WHERE id = '$id'";
		$result = mysqli_query($con , $sql);
		if($result){
			?>
				<div class="alert alert-success" role="alert">
				  Login changed!
				  Now you be redirect on Dashboard;
				</div>
			<?php

			header("Refresh: 3; URL=../dashboard.php");
		}
	} else {
		?>
			<div class="alert alert-danger" role="alert">
			  Login match
			</div>
		<?php
	}
}







?>



<?php require("../include/header.php"); ?>

<div class="container">
  <form action="edit.php" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Login</label>
      <input type="text" class="form-control" name="login" id="exampleInputEmail1"  value="<?=$row['login'];?>">
<!--       <label for="exampleInputEmail1">Old Password</label>
      <input type="text" class="form-control" name="login" id="exampleInputEmail1">
      <label for="exampleInputEmail1">New Password</label>
      <input type="text" class="form-control" name="login" id="exampleInputEmail1">
      <label for="exampleInputEmail1">Repeat New Password</label>
      <input type="text" class="form-control" name="login" id="exampleInputEmail1" > -->
    </div>
    <input type="submit" class="btn btn-primary" name="change" value="Change">
    <a href="admin/" class="btn btn-primary">Cancle</a>
  </form>
</div>





<?php require("../include/footer.html"); ?>
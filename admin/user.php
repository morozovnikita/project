<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require("../config/db.php");
require("is_admin.php");

$id = htmlspecialchars(trim((preg_replace("/[^,.0-9]/", '',$_GET['id']))));
$login = htmlspecialchars(trim($_POST['login']));


$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($con , $sql);
$data = array();
$row = mysqli_fetch_assoc($query);

if(isset($_POST['change'])){
  if($login != $row['login']){
  $login = htmlspecialchars(trim($_POST['login']));
  var_dump($login);
}
}







?>



<?php require("include/header.php"); ?>

<div class="container">
  <form action="user.php" method="POST">
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
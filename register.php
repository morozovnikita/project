<?php
require("config/db.php");

if(!empty($_SESSION)){
  header("Location: dashboard.php");
}

if(isset($_POST['register'])){
  $login = htmlspecialchars(trim($_POST['login']));
  $password = htmlspecialchars(trim(md5($_POST['password'])));

  if(!empty($login && $password)){

    $s = "SELECT * FROM users WHERE login = '$login'";

    $q = mysqli_query($con , $s);

    $num = mysqli_num_rows($q);


    if($num <= 0){
      $sql = "INSERT INTO users(login , password) VALUES('$login' ,'$password')";

      $query = mysqli_query($con , $sql);
      if($query){
        header("Location: login.php");
      }
    } else {
      ?>
        <div class="alert alert-danger" role="alert">
          Login <?=$login;?> yet used!
        </div>
      <?php
    }
  } 
}




?>


<?php require("include/header.php"); ?>

<div class="container">
  <form action="register.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Login">
    <small id="emailHelp" class="form-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Sign up</button>
  <a href="/" class="btn btn-lg btn-primary btn-block" >Back</a>
</form>
</div>

<?php require("include/footer.html"); ?>
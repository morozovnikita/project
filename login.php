<?php

require("config/db.php");

if(!empty($_SESSION)){
  header("Location: dashboard.php");
}


if(isset($_POST['sign_in'])){
  $login = htmlspecialchars(trim($_POST['login']));
  $password = htmlspecialchars(trim(md5($_POST['password'])));

  if(!empty($login && $password)){
    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($con , $sql);

    $num = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    if($num > 0) {
      $_SESSION['user_login'] = $data['login'];
      $_SESSION['user_id'] = $data['id'];
      $_SESSION['user_role'] = $data['role'];
      header("Location: dashboard.php");
    } else {
      ?>
        <div class="alert alert-danger" role="alert">
          Uncorrect Login or Password!
        </div>
      <?php
    }
  }
}


?>


<?php require("include/header.php"); ?>

<div class="container">
  <form action="login.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Login">
    <small id="emailHelp" class="form-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="sign_in" type="submit">Sign in</button>
  <a href="/" class="btn btn-lg btn-primary btn-block" >Back</a>
</form>
</div>

<?php require("include/footer.html"); ?>
<?php

require("../config/db.php");
require("is_admin.php");

$sql = "SELECT * FROM users";
$query = mysqli_query($con , $sql);



?>

<?php require("include/header.php"); ?>
<table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Login</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($query)) { ?>
      <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['login'];?></td>
      <td><?=$row['role'];?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
<?php require("../include/footer.html"); ?>
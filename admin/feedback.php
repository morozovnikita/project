<?php

require("../config/db.php");
require("is_admin.php");

$sql = "SELECT * FROM feedback";
$query = mysqli_query($con , $sql);



?>

<?php require("include/header.php"); ?>
<table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($query)) { ?>
      <tr>
      <th scope="row"><a href="message.php?id=<?=$row['id'];?>"><?=$row['id'];?></a></th>
      <td><?=$row['name'];?></td>
      <td><?=$row['email'];?></td>
      <td><?=$row['text'];?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
<?php require("../include/footer.html"); ?>
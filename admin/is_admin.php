<?php

if($_SESSION['user_role'] != 1){
	header("Location: ../404.html");
}

?>
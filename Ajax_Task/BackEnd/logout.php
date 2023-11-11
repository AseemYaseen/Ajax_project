<?php require("../config.php") ?>
<?php









session_start();
session_unset();
session_destroy();
header('location:http://localhost/Ajax_project/Ajax_Task/userSide/login.php');
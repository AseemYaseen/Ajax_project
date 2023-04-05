<?php require("../config.php") ?>
<?php

session_start();

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE user_id ='$id';";
$query = crud::connect()->prepare($sql);
$query->execute();
// header('location:http://Csc_Task\Admin\dashboard.php');

<?php
require("../config.php");

session_start();

$id = $_POST['id'];

$stmt = crud::makeUnActive();
$stmt->bindValue(':id', $id);
$stmt->execute();
header('Location: http://localhost/Ajax_project/Ajax_Task/Admin/dashboard.php');
exit;
?>
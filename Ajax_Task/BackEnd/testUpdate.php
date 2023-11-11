<?php 

require('../config.php');


session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$id = $_POST['id'];
$old_email = $_POST['old_email'];
$old_username = $_POST['old_username'];


$db = crud::connect()->prepare("UPDATE users SET user_name = :username, email = :email WHERE user_id = :user_id");
$db->bindValue(':user_id', $id);
$db->bindValue(':email', $email);
$db->bindValue(':username', $username);
$db->execute();
echo "Success: User information updated";






?>
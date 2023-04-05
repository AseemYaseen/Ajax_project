<?php require("../config.php") ?>
<?php

session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$query = crud::connect()->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}
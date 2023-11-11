<?php require("../config.php") ?>
<?php

session_start();
$id = $_GET['id'];

        if(!$_SESSION['email']){
            header('location:http://localhost/Ajax_project/Ajax_Task/BackEnd/Login.php');
        } else {
            $sql = "SELECT * FROM users WHERE user_id = $id";
            $query = crud::connect()->prepare($sql);
            $query->execute();
            while($fetchAllUsers = $query->fetch(PDO::FETCH_ASSOC)){
                echo json_encode($fetchAllUsers); 
            }
        }
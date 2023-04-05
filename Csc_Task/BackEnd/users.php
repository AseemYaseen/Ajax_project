<?php require("../config.php") ?>
<?php

session_start();

        if(!$_SESSION['email']){
            header('location:http://localhost/Csc_Task/BackEnd/Login.php');
        } else {
            $sql = "SELECT * FROM users WHERE is_admin = 0";
            $query = crud::connect()->prepare($sql);
            $query->execute();
            while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
                echo json_encode($fetchAllUsers); 
            }
        }

        
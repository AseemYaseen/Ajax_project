<?php require("../config.php") ?>

<?php

$sql = "SELECT * FROM courses";
$query = crud::connect()->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}

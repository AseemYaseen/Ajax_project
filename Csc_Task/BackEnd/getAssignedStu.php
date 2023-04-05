<?php require("../config.php") ?>
<?php

$id = $_GET['id'];

$sql = "SELECT *
FROM users u
LEFT JOIN student_course ON u.user_id = student_course.user_id WHERE student_course.course_id = '$id' AND mark = 0";
$query = crud::connect()->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}



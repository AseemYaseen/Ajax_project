<?php require("../config.php") ?>
<?php

$id = $_GET['id'];

$sql = "SELECT *
        FROM users u
        WHERE u.is_admin = 0
        AND NOT EXISTS (SELECT user_id
        FROM student_course
        WHERE student_course.user_id = u.user_id
        AND student_course.course_id = '$id');";
$query = crud::connect()->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}



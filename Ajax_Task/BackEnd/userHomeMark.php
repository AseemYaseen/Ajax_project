<?php require("../config.php") ?>
<?php

session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM users  INNER JOIN student_course on users.user_id = student_course.user_id INNER JOIN courses on student_course.course_id = courses.course_id WHERE email = '$email'";
$query = crud::connect()->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}
<?php require("../config.php") ?>
<?php

$nameOfCourse = $_POST['nameOfCourse'];
$StuNameMark = $_POST['StuNameMark'];
$stuMark = $_POST['stuMark'];

$errors = array();

if (empty($nameOfCourse)) {
  $errors[] = "Error : Name is required";
}
if (empty($StuNameMark)) {
  $errors[] = "Error : Name is required";
}
if (empty($stuMark)) {
  $errors[] = "Error : Mark is required";
}

if (empty($errors)) {
        $sql = "UPDATE student_course 
                SET course_id = ? , user_id = ? , mark = ?
                WHERE course_id = ? AND user_id = ?";
        $query = crud::connect()->prepare($sql);
        $query->execute([$nameOfCourse, $StuNameMark , $stuMark , $nameOfCourse , $StuNameMark]);
        echo "Added Mark successful!";
    } else {
      echo implode("<br>", $errors);
    }
?>

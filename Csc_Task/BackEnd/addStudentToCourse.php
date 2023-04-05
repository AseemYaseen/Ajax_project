<?php require("../config.php") ?>
<?php

$nameOfCourse = $_POST['nameOfCourse'];
$stuName = $_POST['stuName'];

$errors = array();

if ($nameOfCourse == 'none') {
  $errors[] = "Error : Choose Course";
}
if ($stuName == 'none') {
  $errors[] = "Error : Choose Student";
}

if (empty($errors)) {
    $sql = "INSERT INTO student_course (course_id, user_id)
            VALUES ('$nameOfCourse', '$stuName');";
    $query = crud::connect()->prepare($sql);
    $query->execute();
    echo "Added Student To Course successful!";
    } else {
      echo implode("<br>", $errors);
    }
?>

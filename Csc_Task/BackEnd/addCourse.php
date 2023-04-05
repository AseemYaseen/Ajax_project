<?php require("../config.php") ?>
<?php

$nameOfCourse = $_POST['nameOfCourse'];
$minMark = $_POST['minMark'];

$errors = array();

if (empty($nameOfCourse)) {
  $errors[] = "Error : please enter Name";
}
if (empty($minMark)) {
  $errors[] = "Error : Please enter Mark";
}


if (empty($errors)) {
    
    $select_course = crud::connect()->prepare("SELECT * FROM `courses` WHERE course_name = ?");
    $select_course->execute([$nameOfCourse]);
    $row = $select_course->fetch(PDO::FETCH_ASSOC);
 
    if($select_course->rowCount() > 0){
        $errors[] = 'Error : Course Already Exists!';
        echo implode("<br>", $errors);
    } else {
        $sql = "INSERT INTO courses (course_name, min_mark)
                VALUES ('$nameOfCourse', '$minMark');";
        $query = crud::connect()->prepare($sql);
        $query->execute();
        echo "Added Course successful!";
    };
} else {
    echo implode("<br>", $errors);
}
?>

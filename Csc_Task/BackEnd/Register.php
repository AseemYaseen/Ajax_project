<?php
require('../config.php');

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];

$lowercase = preg_match('@[a-z]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$special = preg_match('@[^\w]@', $password);

$errors = [];

if (empty($user_name)) {
    $errors[] = "Error : Name is required";
}
if (strlen($user_name) < 8) {
    $errors[] = "Error : Name must be more than 8 letter";
}

if (empty($email)) {
    $errors[] = "Error : Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Error : Email";
}

if (empty($password)) {
    $errors[] = "Error : Password is required";
} elseif (!$uppercase || !$lowercase || !$number || !$special || strlen($password) < 8) {
    $errors[] = 'Syntax Error';
}

if (empty($re_password)) {
    $errors[] = "Error : Confirm Password is required";
} elseif ($re_password != $password) {
    $errors[] = 'Error : Password dont match';
}

if (empty($errors)) {
    // $crud = new crud();
    $userEmail = crud::userByEmail();
    $userEmail->bindValue(':email', $email);
    $userEmail->execute();
    $row = $userEmail->fetch(PDO::FETCH_ASSOC);

    if ($userEmail->rowCount() > 0) {
        $errors[] = 'Error : Email is Already Exists!';
        echo implode("<br>", $errors);
    } else {
        $userName = crud::userByName();
        $userName->bindValue(':uName', $user_name);
        $userName->execute();
        $row = $userName->fetch(PDO::FETCH_ASSOC);

        if ($userName->rowCount() > 0) {
            $errors[] = 'Error : User Name is Already Exists!';
            echo implode("<br>", $errors);
        } else {
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $con = crud::addUser();
            $con->bindValue(':fname', $user_name);
            $con->bindValue(':email', $email);
            $con->bindValue(':pass', $pass);
            $con->execute();
            // echo "<script>window.location='login.php'</script>";
        }
    }
} else {
    echo implode("<br>", $errors);
}



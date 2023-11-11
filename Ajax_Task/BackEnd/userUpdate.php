<?php 

require('../config.php');

session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$id = $_POST['id'];
$old_email = $_POST['old_email'];
$old_username = $_POST['old_username'];

$errors = array();

if (empty($username)) {
    $errors[] = "Error : Name is required";
}

if (strlen($username) < 8) {
    $errors[] = "Error : Name must be more than 8 letters";
}

if (empty($email)) {
    $errors[] = "Error : Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Error : Invalid email format";
}

if (empty($errors)) {
    $userByEmail = crud::userByEmail();
    $userByEmail->bindValue(':email', $email);
    $userByEmail->execute();
    $row = $userByEmail->fetch(PDO::FETCH_ASSOC);

    if ($old_email == $email) {
        if ($old_username == $username) {
            $errors[] = 'Error : There is nothing to update!';
            echo implode("<br>", $errors);
        } else {
            $userByName = crud::userByName();
            $userByName->bindValue(':uName', $username);
            $userByName->execute();
            $row = $userByName->fetch(PDO::FETCH_ASSOC);

            if ($userByName->rowCount() > 0) {
                $errors[] = 'Error : Username is already taken!';
                echo implode("<br>", $errors);
            } else {
                echo($id);
                $sql = "UPDATE users SET `user_name`='$username' WHERE `user_id`= '$id'";
                $query = crud::connect()->prepare($sql);
                $query->execute();
            }
        }
    } else if ($userByEmail->rowCount() > 0) {
        $errors[] = 'Error : Email is already taken!';
        echo implode("<br>", $errors);
    } else {
        if ($old_username == $username) {
            $db = crud::connect()->prepare("UPDATE users SET email = :email WHERE user_id = :id");
            $db->bindValue(':id', $id);
            $db->bindValue(':email', $email);
            $db->execute();
        } else {
            $userByName = crud::userByName();
            $userByName->bindValue(':uName', $username);
            $userByName->execute();
            $row = $userByName->fetch(PDO::FETCH_ASSOC);

            if ($userByName->rowCount() > 0) {
                $errors[] = 'Error : Username is already taken!';
                echo implode("<br>", $errors);
            } else {

                $db = crud::connect()->prepare("UPDATE users SET user_name = :username, email = :email WHERE user_id = :user_id");
                $db->bindValue(':user_id', $id);
                $db->bindValue(':email', $email);
                $db->bindValue(':username', $username);
                $db->execute();
                echo "Success: User information updated";
            }
        //     "UPDATE student_course 
        //         SET user_name = ? , email = ? , user_id = ?
        //         WHERE user_id = ?";
        // $query = crud::connect()->prepare($sql);
        // $query->execute([$id, $email , $username ]);
            
        }
    }
} else {

    echo implode("<br>", $errors);
}

?>
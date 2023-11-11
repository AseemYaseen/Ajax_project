
 <?php

    require('../config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    if (empty($email)) {
        $errors[] = "Error : Error with login";
    }

    if (empty($password)) {
        $errors[] = "Error : Error with login";
    }

    if (empty($errors)) {
        $passRead = crud::selectPassUser();
        $passRead->bindValue(':email', $email);
        $passRead->execute();
        $result = $passRead->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])) {
            $db = crud::Login();
            $db->bindValue(':email', $email);
            $db->bindValue(':password', $result['password']);
            $db->execute();



            if ($db->rowCount() > 0) {
                $row = $db->fetch(PDO::FETCH_ASSOC);
                if ($row['is_active'] == 'notActive') {
                    $alert[] = 'Alert : ';
                    echo implode($alert);
                } else {
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['admin'] = $row['is_admin'];
                    $_SESSION['id'] = $row['user_id'];
                    $success[] = $row['is_admin'];
                    echo implode("<br>", $success);
                }
            } else {
                $errors[] = "Error : Wrong Pass login";
                echo implode("<br>", $errors);
            }
        } else {
            echo implode("<br>", $errors);
        }
    }

    ?>


<?php

?>








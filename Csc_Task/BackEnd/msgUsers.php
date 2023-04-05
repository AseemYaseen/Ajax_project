<?php require("../config.php");

session_start();
$email = $_SESSION['email'];

$stm = "SELECT * FROM users WHERE email = '$email'";
$querySTMT = crud::connect()->prepare($stm);
$querySTMT->execute();

while ($fetchUser = $querySTMT->fetch(PDO::FETCH_ASSOC)) {

    if ($fetchUser['is_admin'] == 1) {
        $adminQuery = "SELECT * FROM users WHERE email <> '$email'";
        $query = crud::connect()->prepare($adminQuery);
        $query->execute();

        while ($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)) {
            echo json_encode($fetchAllUsers);
        }
    } else {
        $sql = "SELECT DISTINCT u.user_id, u.user_name, u.email 
                FROM users u 
                LEFT JOIN student_course sc1 ON u.user_id = sc1.user_id 
                LEFT JOIN student_course sc2 ON sc1.course_id = sc2.course_id 
                WHERE (sc2.user_id = :current_user_id OR u.is_admin = 1) AND u.user_id <> :current_user_id;";
        $query = crud::connect()->prepare($sql);
        $query->bindValue(":current_user_id", $fetchUser['user_id']);
        $query->execute();
        while ($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)) {
            echo json_encode($fetchAllUsers);
        }
    }
}

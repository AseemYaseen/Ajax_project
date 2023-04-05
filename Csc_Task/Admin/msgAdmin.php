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
    crud::selectDataUser();
    while ($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)) {
      echo json_encode($fetchAllUsers);
    }
  }
}

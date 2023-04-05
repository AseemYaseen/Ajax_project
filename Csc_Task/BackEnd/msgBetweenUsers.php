<?php require("../config.php") ?>
<?php

session_start();

$id = $_SESSION['id'];
$reciverID = $_GET['reciverID'];

$errors = array();

$sql = "SELECT * FROM messages WHERE ( user_id = '$id' AND reciver_id = '$reciverID' ) OR ( user_id = '$reciverID' AND reciver_id = '$id' ) ORDER BY created_at ASC";
$query = crud::connect()->prepare($sql);
$query->execute();
if( $query->rowCount() == 0 ){ 

    $errors[] = 'Start Conversation';
        echo json_encode($errors);

 } else {

    while($selectedMSG = $query->fetchAll(PDO::FETCH_ASSOC)){
        echo json_encode($selectedMSG);
    }
}

<?php require("../config.php") ?>
<?php

session_start();

$id = $_SESSION['id'];
$reciverID = $_POST['reciverID'];
$content = $_POST['content'];

echo $content ;

if( $content != "" ){
    $sql = crud::connect()->prepare("INSERT INTO messages SET user_id = :user_id, reciver_id = :reciver_id, content = :content");
    $sql->bindValue(':user_id', $id);
    $sql->bindValue(':reciver_id', $reciverID);
    $sql->bindValue(':content', $content);
    $sql->execute();
}



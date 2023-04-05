<?php


class crud{

    public static function connect(){
        try{

        $con=new PDO('mysql:localhost=localhost;dbname=csc_task','root','');

        return $con;

    }catch(PDOException $error){

        echo 'the error ' . $error->getMessage();

    } 

}
public static function selectDataUser(){
  
    $con=crud::connect()->prepare("SELECT * FROM users");
    return  $con;
}

public static function selectPassUser(){
  
    $con=crud::connect()->prepare("SELECT password FROM users WHERE email = :email");
    return  $con;
}

public static function addUser(){
  
    $con=crud::connect()->prepare("INSERT INTO users ( user_name , email , password ) VALUES ( :fname , :email , :pass)");
    return  $con;
}
public static function addUserFromAdmin(){
  
    $con=crud::connect()->prepare("INSERT INTO users ( user_name , email , password, is_active) VALUES ( :fname , :email , :pass, 'Active')");
    return  $con;
}


public static function userByEmail(){
    
    $data=(crud::connect())->prepare( "SELECT * FROM `users` WHERE email = :email");
    return  $data;
}


public static function userByName(){
  
    $data=crud::connect()->prepare( "SELECT * FROM `users` WHERE user_name = :uName");
    return  $data;
}


public static function deleteUser(){
    $con=crud::connect()->prepare("DELETE = '1' WHERE user_id = :id");
    return    $con;
}


public static function Login(){
    $con=crud::connect()->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    return   $con;
}
public static function makeActive(){
    $con=crud::connect()->prepare("UPDATE users SET `is_active`='Active' WHERE `user_id`=:id");
    return   $con;
}

public static function makeUnActive(){
    $con=crud::connect()->prepare("UPDATE users SET `is_active`='notActive' WHERE `user_id`=:id");
    return   $con;
}



}

?>

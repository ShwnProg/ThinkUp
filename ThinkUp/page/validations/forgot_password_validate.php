<?php
include "../../database/db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //connect it to the database
    $db = new ThinkUpDB();

    //gets the user's input
    $input = $_POST['input'] ?? '';

    $error = [];
    if (empty($input))
        $error['input'] = "You'll need to enter a player id or email to continue.";

    $user = $db->FindAccount($input);


    
    if(!empty($input)){
        if(!$user){
            $error['input'] = "No account found. Check your player id or email and try again.";
        }
    }

    if(!empty($error)){
        $_SESSION['error'] = $error;
        $_SESSION['input'] = $_POST;

        header("Location: /page/forgot_password.php");
        exit;
    }
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['user_id'] = $user['user_id'];
    header("Location: /page/change_password.php");
    exit;

    

}
?>
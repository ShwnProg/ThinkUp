<?php
include "../../database/db.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = new ThinkUpDB();

    $new_password = $_POST['new_password']??'';
    $confirm_password = $_POST['confirm_password']??'';

    $error = [];
    if(empty($new_password)) $error['new_password'] = "New password is required";
    if(empty($confirm_password)) $error['confirm_password'] = "Confirm password is required";

    if(!empty($new_password) && !empty($confirm_password)){
        if($new_password !== $confirm_password){
            $error['confirm_password'] = "Passwords do not match";
        }
    }

    if(!empty(($new_password))){
        if(strlen($new_password) < 8){
            $error['new_password'] = "Password must be at least 8 characters long";
        }
        if(!preg_match('/[A-Z]/', $new_password)){
            $error['new_password'] = "Password must contain at least one uppercase letter";
        }
         if(!preg_match('/[a-z]/', $new_password)){
            $error['new_password'] = "Password must contain at least one lowercase letter";
        }
         if(!preg_match('/[0-9]/', $new_password)){
            $error['new_password'] = "Password must contain at least one number";
        }
        if($db->IsSamePassword($_SESSION['user_id'], $new_password)){
            $error['new_password'] = "New password cannot be the same as the old password";
        }
    }

    if(!empty($error)){
        $_SESSION['errors'] = $error;
        $_SESSION['old'] = $_POST;
        header("Location: /page/change_password.php");
        exit;
    }

    $db->UpdatePassword($_SESSION['user_id'], $new_password);
    header("Location: /page/login.php");
    exit;
}
?>
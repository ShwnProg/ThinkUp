<?php
session_start();
header('Content-Type: application/json');

include "../../database/db.php"; 
$db = new ThinkUpDB(); 

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$errors = [];

// Validation
if(empty($email) || empty($message)) {
    $errors[] = "Email and Message fields are required.";
}
if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Return JSON
if(!empty($errors)) {
    echo json_encode(['status'=>'error','messages'=>$errors]);
    exit;
}

try {
    if(empty($name)) {
        $name = "unknown";
    }
    $db->SendMessageEmail($name, $email, $message);
    echo json_encode(['status'=>'success','messages'=>["Message sent successfully!"]]);
} catch(Exception $e) {
    echo json_encode(['status'=>'error','messages'=>["Failed to send message: ".$e->getMessage()]]);
}
exit;
?>
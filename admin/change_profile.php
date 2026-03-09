<?php
include '../database/db.php';
session_start();
header('Content-Type: application/json');

$response = [
    "status" => "error",
    "messages" => []
];

if(!isset($_SESSION['admin_id'])){
    $response["messages"][] = "Unauthorized.";
    echo json_encode($response);
    exit;
}

if (!isset($_FILES['profile-pic'])) {
    $response["messages"][] = "No file uploaded.";
    echo json_encode($response);
    exit;
}

$file = $_FILES['profile-pic'];

if ($file['error'] !== 0) {
    $response["messages"][] = "Upload error.";
    echo json_encode($response);
    exit;
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$allowed = ['png','jpg','jpeg','webp'];

if(!in_array($ext,$allowed)){
    $response["messages"][] = "Only PNG, JPG, JPEG, WEBP allowed.";
    echo json_encode($response);
    exit;
}

$uploadDir = "../images/";
$filename = uniqid() . "." . $ext;
$target = $uploadDir . $filename;

if(!move_uploaded_file($file['tmp_name'],$target)){
    $response["messages"][] = "Failed to save file.";
    echo json_encode($response);
    exit;
}

$db = new ThinkUpDB();
$db->UpdateAdminProfilePic($_SESSION['admin_id'],$filename);

$response["status"] = "success";
$response["messages"][] = "Profile picture updated.";

echo json_encode($response);
exit;
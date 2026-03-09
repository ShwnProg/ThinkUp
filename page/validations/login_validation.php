<?php
include '../../database/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //CONNECT TO THE DATABASE
    $db = new ThinkUpDB();

    //GETS THE USER INPUT
    $input = trim($_POST['input']) ?? '';
    $password = $_POST['password'] ?? '';

    $error = [];

    if (empty($input))
        $error['input'] = 'Username or Email is required';
    if (empty($password))
        $error['password'] = 'Password is required';

    $isUser = false;
    $isAdmin = false;

    // $user = $db->AuthenticateUser($username, $password);

    // echo '<pre>';
    // var_dump($user);


    if (!empty($input) && !empty($password)) {

    $user = $db->AuthenticateUser($input, $password);

    if ($user) {
        $isUser = true;
    } else {
        $admin = $db->AuthenticateAdmin($input, $password);
        if ($admin) {
            $isAdmin = true;
        } else {
            $error['invalid'] = 'Invalid credentials. Incorrect username or password';
        }
    }

}
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['inputs'] = $_POST;
        header("Location: /page/login.php");
        exit;
    }

    if ($isUser) {
        $_SESSION['user_id'] = $user;
        $_SESSION['success'] = true;
        header("Location: /page/index.php");
        exit;
    }

    if ($isAdmin) {
        $_SESSION['admin_id'] = $admin;
        $_SESSION['success'] = true;
        header("Location: /admin/dashboard.php");
        exit;
    }
}
?>
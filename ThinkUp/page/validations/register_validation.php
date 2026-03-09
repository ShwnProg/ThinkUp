<?php
include '../../database/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //CONNECT TO THE DATABASE
    $db = new ThinkUpDB();

    //GETS THE USER INPUT
    $username = $_POST['username'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $suffix = $_POST['suffix'] ?? '';
    $email = $_POST['email'] ?? '';
    $birth_date = $_POST['birth_date'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';

    $error = [];

    if (empty($username))
        $error['username'] = 'Username is required';
    if (empty($first_name))
        $error['first_name'] = 'First name is required';
    if (empty($last_name))
        $error['last_name'] = 'Last name is required';
    if (empty($email))
        $error['email'] = 'Email is required';
    if (empty($birth_date))
        $error['birth_date'] = 'Birth date is required';
    if (empty($gender))
        $error['gender'] = 'Gender is required';
    if (empty($role))
        $error['role'] = 'Role is required';
    if (empty($password))
        $error['password'] = 'Password is required';

    if (!empty($username)) {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            $error['username'] = 'Username can only contain letters, numbers, and underscores';
        } else {
            if ($db->CheckUsernameExists($username)) {
                $error['username'] = 'Username already exists';
            }
        }
    }

    if (!empty($first_name)) {
        if (!preg_match('/^[a-zA-Z ]+$/', $first_name)) {
            $error['first_name'] = 'First name can only contain letters and spaces';
        }
    }

    if (!empty($last_name)) {
        if (!preg_match('/^[a-zA-Z ]+$/', $last_name)) {
            $error['last_name'] = 'Last name can only contain letters and spaces';
        }
    }
    //CHeck if valid age
    if (!empty($birth_date)) {
        $today = new DateTime();
        $birthDate = new DateTime($birth_date);
        $age = $today->diff($birthDate)->y;
        if ($age < 13) {
            $error['birth_date'] = 'You must be at least 13 years old to register';
        }
    }
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Invalid email format';
        }
        // CHECK IF EMAIL IS EXIST
        if ($db->FindEmail($email)) {
            $error['email'] = 'Email already exists';
        }
    }

    if (!empty($password)) {
        if (strlen($password) < 8) {
            $error['password'] = 'Password must be at least 8 characters long';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $error['password'] = 'Password must contain at least one uppercase letter';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $error['password'] = 'Password must contain at least one lowercase letter';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $error['password'] = 'Password must contain at least one number';
        }
        // if (!preg_match('/[\W]/', $password)) {
        //     $error['password'] = 'Password must contain at least one special character';
        // }
    }

    if (empty($error)) {
        $player_id = generatePlayerId();
        $db->RegisterAccount($username, $first_name, $last_name, $email, $suffix, $birth_date, $gender, $player_id, $role, $password);
        header('Location: /page/login.php');
        exit();
    } else {
        $_SESSION['errors'] = $error;
        $_SESSION['old'] = $_POST;
        header('Location: /page/register.php');
        exit();
    }
}
function generatePlayerId($length = 6)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $playerId = '';
    for ($i = 0; $i < $length; $i++) {
        $playerId .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $playerId;
}
?>
<?php
session_start();

$error = $_SESSION['error'] ?? [];
$input = $_SESSION['input'] ?? [];

// var_dump($_SESSION);

unset($_SESSION['error'], $_SESSION['input']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp</title>
    <link rel="stylesheet" href="/styles/authentication.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="forgot-main-container">
        <div class="forgot-container">
            <div class="forgot-header">
                <div class="back-button">
                    <a href="/page/login.php"><i class="fa fa-chevron-left"></i></a>
                </div>
                <h1>Find your <span>account</span></h1>
                <p>Enter your player id or email</p>
            </div>

            <form action="/page/validations/forgot_password_validate.php" method="POST">
                <input type="text" name='input' placeholder="Player id or Email" value="<?=htmlspecialchars($input['input'] ?? '')?>">

                <?php if (!empty($error['input'])): ?>
                    <div class="error"><?=$error['input']; ?></div>
                <?php endif; ?>

                <button type="submit" name='continue'>Continue</button>
            </form>
        </div>
    </div>
</body>

</html>
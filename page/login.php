<?php
session_start();

$error = $_SESSION['error'] ?? [];
$inputs = $_SESSION['inputs'] ?? [];

unset($_SESSION['error'], $_SESSION['inputs']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp</title>
    <link rel="stylesheet" href="/styles/authentication.css">
</head>

<body>

    <div class="login-main-container">

        <div class="login-container">

            <div class="login-header">
                <img src="/images/logo.png" alt="ThinkUp Logo" class="logo">
                <p>Log <span>In</span></p>
            </div>

            <form action="/page/validations/login_validation.php" method="POST">

                <?php if (!empty($error['invalid'])): ?>
                    <div class="error invalid"><?= $error['invalid'] ?></div>
                <?php endif; ?>

                <input type="text" name="input" placeholder="Username or Email"
                    value="<?= htmlspecialchars($inputs['input']) ?? '' ?>">

                <?php if (!empty($error['input'])): ?>
                    <div class="error"><?= $error['input'] ?></div>
                <?php endif; ?>

                <input type="password" name="password" id ="password" placeholder="Password"
                    value="<?= htmlspecialchars($inputs['password']) ?? '' ?>">

                <?php if (!empty($error['password'])): ?>
                    <div class="error"><?= $error['password'] ?></div>
                <?php endif; ?>

                <label class="show-password">
                    <input type="checkbox" id = "show_password"> Show password
                </label>

                <button type="submit" name="login">Login</button>

                <a class="forgot" href="/page/forgot_password.php">Forgot password?</a>

                <p class="register-link">
                    Don't have an account?
                    <a href="/page/register.php">Register</a>
                </p>

            </form>
        </div>
    </div>
</body>
<script>
    let passwordInput = document.getElementById('password');
    let showPasswordCheckbox = document.getElementById('show_password');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
</html>
<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location: /page/login.php");
    exit;
}
// $username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
// $user_id = $_SESSION['user_id'];

$error = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);
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
    <div class="change-password-container">
        <div class="change-password-sub-container">
            <div class="change-password-header">
                <div class="back-button">
                    <a href="/page/forgot_password.php"><i class="fa fa-chevron-left"></i></a>
                </div>
                <h1>Change <span>Password</span></h1>
                <p><?= ucwords($fullname) ?? '' ?></p>
            </div>
            <form action="/page/validations/change_password_validation.php" method="POST">
                <div class="form-group">
                    <input type="password" id="new_password" name="new_password" placeholder="New password"
                        value="<?= htmlspecialchars($old['new_password'] ?? '') ?>">

                    <?php if (isset($error['new_password'])): ?>
                        <div class="error"><?= $error['new_password'] ?></div>
                    <?php endif; ?>

                    <label for="show_password"><input type="checkbox" id="show_password"> Show Password</label>
                </div>
                <div class="form-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password"
                        value="<?= htmlspecialchars($old['confirm_password'] ?? '') ?>">
                    <label for="show_confirm_password"><input type="checkbox" id="show_confirm_password"> Show
                        Password</label>

                    <?php if (isset($error['confirm_password'])): ?>
                        <div class="error"><?= $error['confirm_password'] ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit">Change Password</button>
            </form>
        </div>
    </div>
</body>
<script>
    document.getElementById('show_password').addEventListener('change', function () {
        const newPasswordInput = document.getElementById('new_password');
        newPasswordInput.type = this.checked ? 'text' : 'password';
    });

    document.getElementById('show_confirm_password').addEventListener('change', function () {
        const confirmPasswordInput = document.getElementById('confirm_password');
        confirmPasswordInput.type = this.checked ? 'text' : 'password';
    });
</script>

</html>
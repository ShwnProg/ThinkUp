<?php
session_start();
$error = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp Register</title>

    <link rel="stylesheet" href="/styles/authentication.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    <div class="register-main-container">

        <div class="register-sub-container">

            <div class="login-header">

                <div class="back-button">
                    <a href="/page/login.php"><i class="fa fa-chevron-left"></i></a>
                </div>
                <img src="/images/logo.png" class="logo">
                <p>Regi<span>ster</span></p>
            </div>
            <form action="/page/validations/register_validation.php" method="POST">

                <!-- USERNAME -->
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username"
                    value="<?= htmlspecialchars($old['username'] ?? '') ?>">

                <?php if (!empty($error['username'])): ?>
                    <div class="error"><?= htmlspecialchars($error['username']) ?></div>
                <?php endif; ?>


                <!-- NAME ROW -->
                <div class="name-row">

                    <div class="field">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name"
                            value="<?= htmlspecialchars($old['first_name'] ?? '') ?>">
                        <?php if (!empty($error['first_name'])): ?>
                            <div class="error"><?= htmlspecialchars($error['first_name']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="field">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                            value="<?= htmlspecialchars($old['last_name'] ?? '') ?>">
                        <?php if (!empty($error['last_name'])): ?>
                            <div class="error"><?= htmlspecialchars($error['last_name']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="field">
                        <!-- SUFFIX -->
                        <label for="suffix">Suffix</label>
                        <select name="suffix" id="suffix">
                            <option value="n/a">Select Suffix</option>
                            <option value="jr" <?= (isset($old['suffix']) && $old['suffix'] === 'jr') ? 'selected' : '' ?>>
                                Jr.</option>
                            <option value="sr" <?= (isset($old['suffix']) && $old['suffix'] === 'sr') ? 'selected' : '' ?>>
                                Sr.</option>
                            <option value="iii" <?= (isset($old['suffix']) && $old['suffix'] === 'iii') ? 'selected' : '' ?>>III</option>
                            <option value="n/a" <?= (isset($old['suffix']) && $old['suffix'] === 'n/a') ? 'selected' : '' ?>>N/A</option>
                        </select>
                    </div>

                </div>


                <!-- INFO ROW -->
                <div class="info-row">

                    <div class="field">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" name="birth_date" id="birth_date"
                            value="<?= isset($old['birth_date']) ? htmlspecialchars($old['birth_date']) : '' ?>">
                        <?php if (!empty($error['birth_date'])): ?>
                            <div class="error"><?= htmlspecialchars($error['birth_date']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="field">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male" <?= (isset($old['gender']) && $old['gender'] === 'male') ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= (isset($old['gender']) && $old['gender'] === 'female') ? 'selected' : '' ?>>Female</option>
                            <option value="other" <?= (isset($old['gender']) && $old['gender'] === 'other') ? 'selected' : '' ?>>Other</option>
                        </select>
                        <?php if (!empty($error['gender'])): ?>
                            <div class="error"><?= htmlspecialchars($error['gender']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="field">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="">Select Role</option>
                            <option value="student" <?= (isset($old['role']) && $old['role'] === 'student') ? 'selected' : '' ?>>Student</option>
                            <option value="participant" <?= (isset($old['role']) && $old['role'] === 'participant') ? 'selected' : '' ?>>Participant</option>
                            <option value="other" <?= (isset($old['role']) && $old['role'] === 'other') ? 'selected' : '' ?>>Others</option>
                        </select>
                        <?php if (!empty($error['role'])): ?>
                            <div class="error"><?= htmlspecialchars($error['role']) ?></div>
                        <?php endif; ?>
                    </div>

                </div>


                <!-- EMAIL -->
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email"
                    value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                <?php if (!empty($error['email'])): ?>
                    <div class="error"><?= htmlspecialchars($error['email']) ?></div>
                <?php endif; ?>


                <!-- PASSWORD -->
                <div class="password-input">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        value="<?= htmlspecialchars($old['password'] ?? '') ?>">
                    <?php if (!empty($error['password'])): ?>
                        <div class="error"><?= $error['password'] ?></div>
                    <?php endif; ?>
                    <label for="show-password"><input type="checkbox" id="show-password"> Show Password</label>
                </div>

                <button type="submit" name="submit">Create Account</button>

            </form>
        </div>
    </div>
</body>
<script>
    document.getElementById('show-password').addEventListener('change', function () {
        const passwordField = document.getElementById('password');
        if (this.checked) {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });
</script>
</html>
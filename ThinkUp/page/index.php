<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp</title>

    <link rel="icon" type="image/png"  href="/images/icon.png">
</head>
    <link rel="stylesheet" href="/styles/style.css">

<body>

    <nav class="container">
        <div class="title">
            <h1><img src="/images/logo.png" alt="no image"></h1>
        </div>
        <ul class="lists">
            <li><a href="#home">Home</a></li>
            <li><a href="#subjects">Subjects</a></li>
            <li><a href="#leaderboard">Leaderboard</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a href="/page/login.php" target = "_blank" class="login-btn">Login</a>
            <a href="/page/register.php" target = "_blank" class="register-btn">Register</a>
        </div>
    </nav>
    <section class="home" id="home">
        <div class="home-container">
            <!-- Left side: Text & Buttons -->
            <div class="home-text">
                <h1><span>Welcome to</span> <span class='base'>Think</span>Up</h1>
                <p>Empowering your ideas with creativity and technology. Test your knowledge and improve your
                    skills!</p>
                <!-- Button group -->

                <div class="home-buttons">
                    <a href="#quiz" class="btn start-quiz">Start Quiz</a>
                    <a href="#about" class="btn learn-more">Learn More</a>
                </div>
            </div>

            <!-- Right side: Image -->
            <div class="home-image">
                <img src="/images/thinkup.png" alt="ThinkUp Logo">
            </div>
        </div>
    </section>
</body>

</html>
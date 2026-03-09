<?php
session_start();
$error = $_SESSION['error'] ?? [];
$success = $_SESSION['success'] ?? [];
$old = $_SESSION['old'] ?? [];

// unset($_SESSION['old'],$_SESSION['error'], $_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp</title>

    <link rel="icon" type="image/png" href="/images/icon.png">
</head>
<link rel="stylesheet" href="/styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<body>

    <nav class="container">
        <div class="title">
            <h1><img src="/images/logo.png" alt="no image"></h1>
        </div>
        <ul class="lists">
            <li><a href="#home">Home</a></li>
            <li><a href="#subjects">Subjects</a></li>
            <!-- <li><a href="#leaderboard">Leaderboard</a></li> -->
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a href="/page/login.php" target="_blank" class="login-btn">Login</a>
            <a href="/page/register.php" target="_blank" class="register-btn">Register</a>
        </div>
    </nav>
    <section class="home" id="home">
        <div class="home-container">
            <!-- Left side: Text & Buttons -->
            <div class="home-text animate-on-scroll">
                <h1><span>Welcome to</span> <span class="base">Think</span>Up</h1>
                <h3 class="tagline">Your hub for learning and exploration!</h3>
                <p>Empowering your ideas with creativity and technology. Test your knowledge and improve your skills!
                </p>

                <div class="home-buttons animate-on-scroll">
                    <div class="btn-wrapper">
                        <a href="/page/login.php" target="_blank" class="btn start-quiz">📝 Start Quiz</a>
                        <p class="btn-desc">Take quizzes now and test your knowledge across all subjects!</p>
                    </div>

                    <div class="btn-wrapper animate-on-scroll">
                        <a href="#about" class="btn learn-more">🔍 Learn More</a>
                        <p class="btn-desc">Discover more about ThinkUp and how it can help you learn better.</p>
                    </div>
                </div>
            </div>

            <!-- Right side: Image -->
            <div class="home-image animate-on-scroll">
                <img src="/images/thinkUp_profile.png" alt="ThinkUp Logo">
            </div>
        </div>
    </section>

    <section class="subjects" id="subjects">
        <div class="subjects-header animate-on-scroll">
            <h1>Explore <span>Our <span>Subjects</span></span></h1>
            <p>Discover a variety of subjects to strengthen your knowledge and skills. Choose a subject to learn,
                practice, and grow!</p>
        </div>

        <div class="subject-form">
            <div class="subject-card math animate-on-scroll">
                <h2>Mathematics</h2>
                <span class="badge">Popular</span>
                <img src="/images/math.png" alt="math image">
                <p>
                    Dive into the world of numbers, equations, and problem-solving. Explore concepts, practice
                    exercises, and strengthen your analytical skills.
                    <span class="fun-fact"><strong>Fun Fact:</strong> The Fibonacci sequence appears in nature!</span>
                </p>
                <a href="https://en.wikipedia.org/wiki/Mathematics" target="_blank" class="read-more">Read More</a>
            </div>

            <div class="subject-card science animate-on-scroll">
                <h2>Science</h2>
                <span class="badge">New</span>
                <img src="/images/science.jpg" alt="science image">
                <p>
                    Discover the wonders of the natural world! Learn about physics, chemistry, biology, and more through
                    clear explanations and experiments.
                    <span class="fun-fact"><strong>Fun Fact:</strong> Water can boil and freeze at the same time under
                        certain conditions!</span>
                </p>
                <a href="https://www.science.org/" target="_blank" class="read-more">Read More</a>
            </div>

            <div class="subject-card english animate-on-scroll">
                <h2>English</h2>
                <img src="/images/english.jpg" alt="english image">
                <p>
                    Enhance your language skills! Explore grammar, vocabulary, reading, and writing exercises designed
                    to make learning English simple and fun.
                    <span class="fun-fact"><strong>Tip:</strong> Reading 15 minutes daily improves your
                        vocabulary!</span>
                </p>
                <a href="https://www.englishclub.com/" target="_blank" class="read-more">Read More</a>
            </div>

            <div class="subject-card history animate-on-scroll">
                <h2>History</h2>
                <img src="/images/history.jpg" alt="history image">
                <p>
                    Travel through time and uncover the stories of civilizations, leaders, and events that shaped the
                    world.
                    <span class="fun-fact"><strong>Fun Fact:</strong> The Great Wall of China is over 13,000 miles
                        long!</span>
                </p>
                <a href="https://www.history.com/" target="_blank" class="read-more">Read More</a>
            </div>

            <div class="subject-card communication animate-on-scroll">
                <h2>Communication</h2>
                <img src="/images/communication.jpg" alt="communication image">
                <p>
                    Learn the art of expressing ideas clearly and effectively. Explore speaking, writing, and
                    interpersonal skills.
                    <span class="fun-fact"><strong>Tip:</strong> Listening carefully is just as important as
                        speaking!</span>
                </p>
                <a href="https://www.britannica.com/topic/communication" target="_blank" class="read-more">Read More</a>
            </div>

            <div class="subject-card programming animate-on-scroll">
                <h2>Programming</h2>
                <span class="badge">Popular</span>
                <img src="/images/programming.jpg" alt="programming image">
                <p>
                    Unlock the world of coding! Learn to create apps, solve problems, and build projects using
                    beginner-friendly lessons.
                    <span class="fun-fact"><strong>Tip:</strong> Writing small programs daily improves coding skills
                        quickly!</span>
                </p>
                <a href="https://www.codecademy.com/article/what-is-programming" target="_blank" class="read-more">Read More</a>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="about-container">
            <!-- Left: Text -->
            <div class="about-text animate-on-scroll">
                <h2>About <span>ThinkUp</span></h2>
                <p>
                    ThinkUp is an interactive, gamified learning platform where students can explore subjects,
                    take quizzes, and level up their skills while having fun!
                </p>
                <p>
                    Compete with friends and other users on the <strong>leaderboard</strong>, earn ranks, and unlock
                    achievements as you master new concepts. ThinkUp turns learning into an exciting challenge that
                    motivates you to grow.
                </p>
            </div>

            <!-- Right: Image -->
            <div class="about-image animate-on-scroll">
                <img src="/images/thinkup.png" alt="ThinkUp Learning Game">
            </div>
        </div>

        <!-- Mission & Vision Section -->
        <div class="mission-vision animate-on-scroll">
            <div class="mv-card">
                <h3><span>Our Mission</span></h3>
                <p>To make learning enjoyable, engaging, and rewarding by combining education with gamified challenges,
                    helping users grow their skills and knowledge every day.</p>
            </div>
            <div class="mv-card">
                <h3>Our Vision</h3>
                <p>To become the leading interactive platform that inspires learners worldwide to achieve excellence
                    through fun, motivation, and healthy competition.</p>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="contact-header animate-on-scroll">
            <h2>Contact <span>ThinkUp</span></h2>
            <p>Have questions or want to connect? Reach out to us through any of the methods below!</p>
        </div>

        <div class="contact-card-wrapper">
            <!-- Contact Info Card -->
            <div class="contact-info-card animate-on-scroll">
                <h3>Email</h3>
                <p><i class="fa-solid fa-envelope"></i> thinkup@gmail.com</p>
            </div>

            <div class="contact-info-card animate-on-scroll">
                <h3>Phone</h3>
                <p><i class="fa-solid fa-phone"></i> +63 954 254 0992</p>
            </div>

            <div class="contact-info-card animate-on-scroll">
                <h3>Social</h3>
                <p>
                    <a href="#"><i class="fab fa-facebook-f animate-on-scroll"></i></a>
                    <a href="#"><i class="fab fa-twitter animate-on-scroll"></i></a>
                    <a href="#"><i class="fab fa-instagram animate-on-scroll"></i></a>
                    <a href="#"><i class="fab fa-tiktok animate-on-scroll"></i></a>
                    <a href="#"><i class="fab fa-youtube animate-on-scroll"></i></a>
                </p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper animate-on-scroll">
            <form id="contactForm" action="/page/validations/contact_validation.php" method="POST">

                <input type="text" name="name" placeholder="Your Name (Optional)"
                    value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">

                <input type="text" name="email" placeholder="Your Email"
                    value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">

                <textarea name="message" rows="5"
                    placeholder="Your Message"><?php echo htmlspecialchars($old['message'] ?? ''); ?></textarea>

                <button type="button" class="send-msg" id='sendBtn'>Send Message</button>

            </form>

        </div>
    </section>
    <!-- Modal for messages -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-icon" id="modalIcon"></div>
            <div id="modalMessage"></div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contactForm'); 
        const sendBtn = document.getElementById('sendBtn');
        const modal = document.getElementById('messageModal');
        const modalMessage = document.getElementById('modalMessage');
        const closeBtn = document.querySelector('.modal .close');

        if (!form || !sendBtn) return;

        // Close modal
        closeBtn.onclick = () => modal.classList.remove('show', 'success', 'error');
        window.onclick = (e) => { if (e.target === modal) modal.classList.remove('show', 'success', 'error'); }

        // Show modal
        const showModal = (type, messages) => {
            const iconHTML = type === 'success'
                ? '<i class="fas fa-check-circle"></i>'
                : '<i class="fas fa-times-circle"></i>';

            modalMessage.innerHTML = iconHTML + messages.map(m => `<p>${m}</p>`).join('');
            modal.classList.remove('success', 'error');
            modal.classList.add('show', type);
        }

        // Button click -> AJAX
        sendBtn.addEventListener('click', (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            fetch(form.action, { method: 'POST', body: formData })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        showModal('success', data.messages);
                        form.reset();
                    } else if (data.status === 'error') {
                        showModal('error', data.messages);
                    }
                })
                .catch(() => showModal('error', ["Something went wrong. Try again!"]));
        });
    });
</script>
<script src="/scripts/index.js"></script>

</html>
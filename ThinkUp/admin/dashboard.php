<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkUp Dashboard</title>
    <link rel="stylesheet" href="/styles/adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="top">
            <button class="toggle-btn" id="toggle-btn"><i class="fa-solid fa-bars"></i></button>
            <h2 class="logo"><span>Think</span>Up</h2>
        </div>

        <!-- PLAYERS -->
        <a href="dashboard.php?page=players" class="menu-btn">
            <i class="fa-solid fa-users"></i>
            <span class="menu-text">Players</span>
        </a>


        <!-- SUBJECTS -->
        <a href="dashboard.php?page=subjects" class="menu-btn">
            <i class="fa-solid fa-book"></i>
            <span class="menu-text">Subjects</span>
        </a>

        <!-- LEADERBOARD -->
        <a href="dashboard.php?page=leaderboard" class="menu-btn">
            <i class="fa-solid fa-trophy"></i>
            <span class="menu-text">Leaderboard</span>
        </a>

        <!-- PROFILE -->
        <a href="dashboard.php?page=profile" class="menu-btn">
            <i class="fa-solid fa-user"></i>
            <span class="menu-text">Profile</span>
        </a>

    </div>

    <!-- MAIN CONTENT -->
    <div class="content">

        <div class="topbar">
            <!-- Admin Panel message on the left -->
            <div class="admin-title">
                <h2>Admin <span>Panel</span></h2>
            </div>

            <!-- Profile dropdown on the right -->
            <div class="profile-dropdown">
                <div class="profile-info">
                    <span class="name">Shawn Marlo Galdo</span>
                    <span class="id">ADMIN</span>
                </div>
                <img src="/images/profile.webp" alt="Profile" class="profile-pic">
                <i class="fa-solid fa-caret-down dropdown-icon"></i>

                <!-- Dropdown menu -->
                <div class="profile-menu">
                    <a href="#"><i class="fa-solid fa-key"></i> View Profile</a>
                    <a href="#"><i class="fa-solid fa-list-check"></i> Actions</a>
                    <div class="logout">
                        <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="dashboard-page" class="page">
            <h1>Dashboard</h1>
            <p>Welcome to ThinkUp Admin Panel!</p>
        </div>

        <div id="players-page" class="page">
            <h1>Players</h1>
            <p>List of all players.</p>
        </div>

        <div id="subjects-page" class="page">
            <h1>Subjects</h1>
            <p>Manage subjects here.</p>
        </div>

        <div id="leaderboard-page" class="page">
            <h1>Leaderboard</h1>
        </div>
    </div>

    <script src="/scripts/adminscript.js"></script>

</body>

</html>
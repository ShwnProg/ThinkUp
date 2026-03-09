<?php
include '../database/db.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    $response["messages"][] = "Unauthorized.";
    echo json_encode($response);
    exit;
}
$admin_id = $_SESSION['admin_id'] ?? null;

$db = new ThinkUpDB();
$admin_info = $db->GetAdminInformationByID($admin_id);

$page = $_GET['page'] ?? 'home';

$error = $_SESSION['error'] ?? [];
$success = $_SESSION['success'] ?? [];
?>
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

        <a href="dashboard.php?page=home" class="menu-btn">
            <i class="fa-solid fa-house"></i>
            <span class="menu-text">Home</span>
        </a>

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
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">

        <div class="topbar">
            <!-- Admin Panel message on the left -->
            <div class="admin-title">
                <h2>Admin <span>Dashboard</span></h2>
            </div>

            <!-- Profile dropdown on the right -->
            <div class="profile-dropdown">
                <div class="profile-info">
                    <span class="name"><?= htmlspecialchars($admin_info['admin_name']) ?></span>
                    <span class="id"><?= ucfirst($admin_info['admin_role']) ?></span>
                </div>
                <img src="/images/<?= htmlspecialchars($admin_info['profile_pic']) ?>" alt="Profile"
                    class="profile-pic" />

                <i class="fa-solid fa-caret-down dropdown-icon"></i>

                <!-- Dropdown menu -->
                <div class="profile-menu">
                    <a href="dashboard.php?page=profile"><i class="fa-solid fa-key"></i> View Profile</a>
                    <a href="#"><i class="fa-solid fa-list-check"></i> Actions</a>
                    <div class="logout">
                        <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="home-page" class="page" style="display: <?= $page === 'home' ? 'block' : 'none' ?>">
            <h1>Dashboard</h1>
            <p>Welcome to ThinkUp Admin Panel!</p>
        </div>

        <div id="players-page" class="page" style="display: <?= $page === 'players' ? 'block' : 'none' ?>">
            <h1>List of all <span>players</span>.</h1>

            <div class="player-sub-container">
                <table class='player-table'>
                    <thead>
                        <tr>
                            <th>Player Id</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>User Role</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $players = $db->ReadPlayers();

                        foreach ($players as $player) {

                            echo "<tr>";
                            echo "<td>" . $player['player_id'] . "</td>";
                            echo "<td>" . $player['username'] . "</td>";
                            echo "<td>" . $player['fullname'] . "</td>";
                            echo "<td>" . ucfirst($player['user_role']) . "</td>";
                            echo "<td>" . ucfirst($player['gender']) . "</td>";
                            echo "<td>" . $player['email'] . "</td>";
                            echo "<td> <button class = 'view-btn' name = 'view-btn'> View </button><button name = 'ban-btn' class ='ban-btn'> Banned </button></td>";
                            echo "</tr>";

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="subjects-page" class="page" style="display: <?= $page === 'subjects' ? 'block' : 'none' ?>">
            <h1>Subjects</h1>
            <p>Manage subjects here.</p>
        </div>

        <div id="leaderboard-page" class="page" style="display: <?= $page === 'leaderboard' ? 'block' : 'none' ?>">
            <h1>Leaderboard</h1>
        </div>

        <div id="profile-page" class="page" style="display: <?= $page === 'profile' ? 'flex' : 'none' ?>;">
            <h1>My <span>Profile </span></h1>
            <div class="profile-container">
                <!-- PROFILE PICTURE -->
                <div class="profile-pic-wrapper">
                    <img src="/images/<?= htmlspecialchars($admin_info['profile_pic']) ?>" alt="Profile" />
                    <p><?= ucwords($admin_info['admin_name']) ?></p>
                </div>

                <form id="upload-form" class="upload-form" action="/admin/change_profile.php" method="POST"
                    enctype="multipart/form-data">

                    <input type="file" name="profile-pic" id="profile-pic-input" style="display:none;"
                        accept=".png,.jpg,.jpeg,.webp">

                    <button type="button" class="choose-file-btn" id="choose-file-btn">
                        Upload new photo
                    </button>

                    <small>Only PNG, JPG, WEBP allowed</small>
                </form>

                <!-- ADMIN INFORMATION -->
                <div class="admin-information">
                    <p><span>Full Name :</span> <?= ucwords($admin_info['admin_name']) ?></p>
                    <p><span>Role :</span> <?= ucfirst($admin_info['admin_role']) ?></p>
                    <p><span>Email :</span> <?= htmlspecialchars($admin_info['email']) ?></p>
                    <p><span>Address :</span> <?= htmlspecialchars($admin_info['address']) ?></p>
                </div>
            </div>
        </div>

        <div id="messageModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-icon" id="modalIcon"></div>
                <div id="modalMessage"></div>
            </div>
        </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const fileInput = document.getElementById("profile-pic-input");
        const chooseBtn = document.getElementById("choose-file-btn");
        const form = document.getElementById("upload-form");

        const modal = document.getElementById("messageModal");
        const modalMessage = document.getElementById("modalMessage");
        const closeBtn = document.querySelector(".modal .close");

        // open file picker
        chooseBtn.addEventListener("click", () => {
            fileInput.click();
        });

        // kapag may napiling file
        fileInput.addEventListener("change", () => {

            if (!fileInput.files.length) return;

            const formData = new FormData(form);

            fetch(form.action, {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);

                    showModal(data.status, data.messages);

                    if (data.status === "success") {
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }

                })
                .catch(() => {
                    showModal("error", ["Upload failed. Please try again."]);
                });

        });

        // modal function
        function showModal(type, messages) {

            const icon = type === "success"
                ? '<i class="fas fa-check-circle"></i>'
                : '<i class="fas fa-times-circle"></i>';

            modalMessage.innerHTML = icon + messages.map(m => `<p>${m}</p>`).join("");

            modal.classList.remove("success", "error");
            modal.classList.add("show", type);
        }

        // close modal
        closeBtn.onclick = () => modal.classList.remove("show", "success", "error");

        window.onclick = (e) => {
            if (e.target === modal) {
                modal.classList.remove("show", "success", "error");
            }
        }

    });
</script>
<script src="/scripts/adminscript.js"></script>

</html>
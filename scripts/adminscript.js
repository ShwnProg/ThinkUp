// Toggle sidebar
let toggleBtn = document.getElementById("toggle-btn");
let sidebar = document.querySelector(".sidebar");

toggleBtn.onclick = function () {
    sidebar.classList.toggle("hide");
}

// Profile dropdown
let profileDropdown = document.querySelector(".profile-dropdown");

profileDropdown.addEventListener("click", function () {
    this.classList.toggle("active");
});

const menuButtons = document.querySelectorAll(".menu-btn");
const pages = document.querySelectorAll(".page");

menuButtons.forEach(button => {
    button.addEventListener("click", () => {

        const page = button.getAttribute("data-page");

        pages.forEach(p => {
            p.style.display = "none";
        });

        document.getElementById(page + "-page").style.display = "block";

    });
});
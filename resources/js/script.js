const toggleSidebarButton = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("mainContent");

function toggleSidebar() {
    sidebar.classList.toggle("-translate-x-64");
    mainContent.classList.toggle("ml-0");
    if (sidebar.classList.contains("-translate-x-64")) {
        localStorage.setItem("sidebarStatus", "open");
    } else {
        localStorage.setItem("sidebarStatus", "closed");
    }
}

toggleSidebarButton.addEventListener("click", toggleSidebar);

const storedSidebarStatus = localStorage.getItem("sidebarStatus");
if (storedSidebarStatus === "open") {
    toggleSidebar();
}
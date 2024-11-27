document
    .getElementById("toggle-menu")
    .addEventListener("click", function () {
        const menu = document.getElementById("category-menu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });

document
    .getElementById("btn-menu")
    .addEventListener("click", function () {
        const menu = document.getElementById("navbar-menu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });

document.addEventListener("click", function (event) {
    const categoryMenu = document.getElementById("category-menu");
    const toggleMenuButton = document.getElementById("toggle-menu");
    const navbarMenu = document.getElementById("navbar-menu");
    const btnMenuButton = document.getElementById("btn-menu");
    if (
        !categoryMenu.contains(event.target) &&
        !toggleMenuButton.contains(event.target)
    ) {
        categoryMenu.style.display = "none";
    }
    if (window.innerWidth <= 1024) {
        if (
            !navbarMenu.contains(event.target) &&
            !btnMenuButton.contains(event.target)
        ) {
            navbarMenu.style.display = "none";
        }
    }
});
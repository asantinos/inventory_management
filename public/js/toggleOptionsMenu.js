const menuButton = document.getElementById("options-menu-button");
const optionsMenu = document.getElementById("options-menu");

let menuIsShown = false;

menuButton.addEventListener("click", function () {
    if (menuIsShown) {
        optionsMenu.classList.add("hidden");
        menuIsShown = false;
    } else {
        optionsMenu.classList.remove("hidden");
        menuIsShown = true;
    }
});

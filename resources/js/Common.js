const Main_menu_btn = document.getElementById("menu-btn");

const menu = document.getElementById("menu");

/*Hamburger Function */
if (Main_menu_btn != null) {
    Main_menu_btn.addEventListener("click", function()
    {
        navToggle()
    })
}
function navToggle() {
    Main_menu_btn.classList.toggle("open");
    menu.classList.toggle("absolute");
    menu.classList.toggle("hidden");
  }

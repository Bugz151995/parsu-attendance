document.addEventListener('DOMContentLoaded', () => {
  var menu_btn = document.querySelector("#menu-btn");
  var sidebar = document.querySelector("#sidebar");
  var container = document.querySelector(".content-wrapper");
  menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("main-content");
  });
});
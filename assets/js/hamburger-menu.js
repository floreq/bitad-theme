const hamburger = document.querySelector("#bitad-hamburger");
const menu = document.querySelector(".bitad-nav");
const html = document.querySelector("html");

hamburger.addEventListener("click", onClickHamburger);

function onClickHamburger() {
  if (menu.classList.contains("bitad-open")) {
    menu.classList.remove("bitad-open");
    html.classList.remove("no-scroll");
  } else {
    menu.classList.add("bitad-open");
    html.classList.add("no-scroll");
  }
}

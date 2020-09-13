const html = document.querySelector("html");
const hamburger = document.querySelector("#bitad-hamburger");
const menu = document.querySelector(".bitad-nav");
const menuLinks = document.querySelectorAll(".bitad-nav-links > li");

hamburger.addEventListener("click", () => {
  menu.classList.toggle("bitad-open");
  html.classList.toggle("no-scroll");
});

// Relewant when clicked anchor link
menuLinks.forEach((e) => {
  e.addEventListener("click", () => {
    if (menu.classList.contains("bitad-open")) {
      html.classList.remove("no-scroll");
      menu.classList.remove("bitad-open");
    }
  });
});

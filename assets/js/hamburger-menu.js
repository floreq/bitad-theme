const html = document.querySelector("html");
const hamburger = document.querySelector("#bitad-hamburger");
const menu = document.querySelector(".bitad-nav");
const menuLinks = document.querySelectorAll(".bitad-nav-links > li");

hamburger.addEventListener("click", () => {
  if (menu.classList.contains("bitad-open")) {
    menu.classList.remove("bitad-open");
    html.classList.remove("no-scroll");
  } else {
    menu.classList.add("bitad-open");
    html.classList.add("no-scroll");
  }
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

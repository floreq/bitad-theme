function timeline() {
  const workshopsTime = document.querySelectorAll(
    ".wp-block-columns .wp-block-column"
  );
  console.log(workshopsTime);

  const time = Array.from(workshopsTime).map((e) => {
    console.log(e.textContent);
  });
}

if (document.readyState === "loading") {
  // Loading hasn't finished yet
  document.addEventListener("DOMContentLoaded", timeline);
} else {
  // `DOMContentLoaded` has already fired
  timeline();
}

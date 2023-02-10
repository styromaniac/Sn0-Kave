var copyright = document.querySelector(".copyright");
var mit = document.querySelector("#MIT");

copyright.addEventListener("click", function() {
  mit.classList.toggle("visible");

  if (mit.classList.contains("visible")) {
    mit.scrollIntoView({ behavior: "smooth" });
  }
});
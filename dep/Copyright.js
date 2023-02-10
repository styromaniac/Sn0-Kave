var copyright = document.querySelector(".copyright");
var mit = document.querySelector("#MIT");

copyright.addEventListener("click", function() {
  mit.classList.toggle("visible");
  mit.scrollIntoView({ behavior: "smooth" });
});
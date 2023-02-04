  var copyright = document.querySelector(".copyright");
  var mit = document.querySelector("#MIT");

  copyright.addEventListener("click", function() {
    mit.classList.toggle("visible");
    window.scrollTo(0, document.body.scrollHeight);
  });

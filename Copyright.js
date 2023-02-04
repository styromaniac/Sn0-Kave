  var copyright = document.querySelector(".copyright");
  var mit = document.querySelector("#MIT");

  copyright.addEventListener("click", function() {
    mit.classList.toggle("visible");
    mit.addEventListener("transitionend", function() {
      setTimeout(function() {
        window.scrollTo(0, document.body.scrollHeight);
      }, 1000);
    });
  });

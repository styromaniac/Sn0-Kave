var copyright = document.querySelector(".copyright");
var mit = document.querySelector("#MIT");

copyright.addEventListener("click", function() {
  mit.classList.toggle("visible");

  var observer = new MutationObserver(function() {
    if (mit.style.height === "100%") {
      window.scrollTo(0, document.body.scrollHeight);
      observer.disconnect();
    }
  });
  observer.observe(mit, { attributes: true });
});

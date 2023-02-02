let videos = document.querySelectorAll("video");

function handleIntersection(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.play();
    } else {
      entry.target.currentTime = 0;
      entry.target.pause();
    }
  });
}

let observer = new IntersectionObserver(handleIntersection);

videos.forEach(video => {
  video.muted = true;
  video.loop = true;
  observer.observe(video);
  video.removeAttribute("controls");

  video.addEventListener("mouseenter", function() {
      video.play();
  });

  video.addEventListener("touchstart", function() {
      video.play();
  });
});

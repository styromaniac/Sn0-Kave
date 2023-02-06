// Listen for installation event
self.addEventListener("install", function(event) {
  console.log("Service worker installed");
});

// Listen for activation event
self.addEventListener("activate", function(event) {
  console.log("Service worker activated");
});

// Listen for fetch events
self.addEventListener("fetch", function(event) {
  console.log("Service worker fetching resource: " + event.request.url);
});

// Listen for sync event
self.addEventListener("sync", function(event) {
  console.log("Service worker syncing data");
  if (event.tag === "background-sync") {
    // Perform background sync here
    // Add the code from the script
    document.querySelectorAll("img[data-magnet], video[data-magnet]").forEach(function(element) {
      const magnetURI = element.getAttribute("data-magnet");
      const client = new WebTorrent();
  
      client.add(magnetURI, function (torrent) {
        element.src = URL.createObjectURL(torrent.files[0].createReadStream());
  
        torrent.on('done', function () {
          client.seed(torrent.files);
        });
      });
    });
  }
});

// Register the service worker
if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker.register("/sw.js").then(function(registration) {
      console.log("Service worker registration successful: ", registration.scope);
    }, function(error) {
      console.log("Service worker registration failed: ", error);
    });
  });
}
setInterval(function() {
  console.log("Triggering background sync");
  self.registration.sync.register("background-sync");
}, 24 * 60 * 60 * 1000); // 24 hours in milliseconds

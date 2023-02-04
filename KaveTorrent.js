document.querySelectorAll("img[data-magnet], video[data-magnet]").forEach(function(element) {
  const magnetURI = element.getAttribute("data-magnet");
  const client = new WebTorrent();

  client.add(magnetURI, function (torrent) {
    element.src = URL.createObjectURL(torrent.files[0].createReadStream());

    torrent.on('done', function () {
      caches.open('torrent-cache')
        .then(cache => cache.addAll(torrent.files.map(file => file.getBlobURL())))
        .then(() => client.seed(torrent.files));
      element.style.outline = "green solid 4px";
    });
  });
});

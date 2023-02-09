const mediaElements = document.querySelectorAll('img[data-magnet], video[data-magnet]');
const client = new WebTorrent();

mediaElements.forEach(element => {
  const magnetURI = element.getAttribute('data-magnet');
  element.crossOrigin = "anonymous";
  let torrentId = magnetURI + "-" + element.id;

  if (!("caches" in window)) {
    client.add(magnetURI, { path: element.id }, torrent => {
      torrent.on("done", () => {
        client.seed(torrent.files[0].path, () => {
          const url = URL.createObjectURL(torrent.files[0].getBlob());
          element.src = url;
          element.addEventListener("loadedmetadata", () => {
            document.querySelector("#media").appendChild(element);
          });
        });
      });
    });
  } else {
    caches.open("webtorrent").then(cache => {
      cache.match(torrentId).then(cachedTorrent => {
        if (cachedTorrent) {
          client.seed(cachedTorrent, () => {
            cache.match(torrentId + "-url").then(cachedURL => {
              if (cachedURL) {
                element.src = cachedURL;
                element.addEventListener("loadedmetadata", () => {
                  document.querySelector("#media").appendChild(element);
                });
              }
            });
          });
        } else {
          client.add(magnetURI, { path: element.id }, torrent => {
            torrent.on("done", () => {
              client.seed(torrent.files[0].path, () => {
                const url = URL.createObjectURL(torrent.files[0].getBlob());
                cache.put(torrentId, torrent.files[0].path);
                cache.put(torrentId + "-url", url);
                element.src = url;
                element.addEventListener("loadedmetadata", () => {
                  document.querySelector("#media").appendChild(element);
                });
              });
            });
          });
        }
      });
    });
  }
});
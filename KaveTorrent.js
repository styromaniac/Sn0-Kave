document.querySelectorAll("img[data-magnet], video[data-magnet]").forEach(function(element) {
  const magnetURI = element.getAttribute("data-magnet");
  const client = new WebTorrent();

  const dbName = 'torrent-db';
  const objectStoreName = 'torrent-files';

  var request = indexedDB.open(dbName);
  request.onsuccess = function(event) {
    var db = event.target.result;
    var objectStore = db.transaction([objectStoreName], 'readonly').objectStore(objectStoreName);
    var fileRequest = objectStore.get(element.src);
    fileRequest.onsuccess = function(event) {
      if (fileRequest.result) {
        element.src = URL.createObjectURL(fileRequest.result);
      } else {
        client.add(magnetURI, function (torrent) {
          element.src = URL.createObjectURL(torrent.files[0].createReadStream());

          torrent.on('done', function () {
            var db = event.target.result;
            var transaction = db.transaction([objectStoreName], 'readwrite');
            var objectStore = transaction.objectStore(objectStoreName);

            torrent.files.forEach(function(file) {
              objectStore.put(file.getBlob(), file.name);
            });

            transaction.oncomplete = function() {
              client.seed(torrent.files);
            };
          });
        });
      }
    };
  };
});

document.querySelectorAll("img[data-magnet][src$='.jpg'], video[data-magnet][src$='.mp4']").forEach(function(element) {
  const magnetURI = element.getAttribute("data-magnet");
  const client = new WebTorrent({dht: true});

  const dbName = 'torrent-db';
  const objectStoreName = 'torrent-files';

  var request = indexedDB.open(dbName);
  request.onsuccess = function(event) {
    var db = event.target.result;
    var objectStore = db.transaction([objectStoreName], 'readonly').objectStore(objectStoreName);
    var fileRequest = objectStore.get(element.src);
    fileRequest.onsuccess = function(event) {
      if (fileRequest.result) {
        var cachedFile = fileRequest.result;
        client.add(magnetURI, {
          path: cachedFile.webkitRelativePath,
          file: cachedFile
        }, function (torrent) {
          var file = torrent.files.find(function(file) {
            return file.name.endsWith('.jpg') || file.name.endsWith('.mp4');
          });

          if (file) {
            element.src = URL.createObjectURL(file.createReadStream());

            torrent.on('done', function () {
              var db = event.target.result;
              var transaction = db.transaction([objectStoreName], 'readwrite');
              var objectStore = transaction.objectStore(objectStoreName);

              objectStore.put(file.getBlob(), file.name);

              transaction.oncomplete = function() {
                client.seed(torrent.files);
              };
            });
          }
        });
      } else {
        client.add(magnetURI, function (torrent) {
          var file = torrent.files.find(function(file) {
            return file.name.endsWith('.jpg') || file.name.endsWith('.mp4');
          });

          if (file) {
            element.src = URL.createObjectURL(file.createReadStream());

            torrent.on('done', function () {
              var db = event.target.result;
              var transaction = db.transaction([objectStoreName], 'readwrite');
              var objectStore = transaction.objectStore(objectStoreName);

              objectStore.put(file.getBlob(), file.name);

              transaction.oncomplete = function() {
                client.seed(torrent.files);
              };
            });
          }
        });
      }
    };
  };
});

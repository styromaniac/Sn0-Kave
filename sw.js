const CACHE_NAME = "my-site-cache-v1";
const urlsToCache = [
  '/*'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(cache => {
      console.log('Opened cache');
      return cache.addAll(urlsToCache);
    }).then(() => {
        var cameraDir = './Camera'
    window.requestFileSystem  = window.requestFileSystem || window.webkitRequestFileSystem;
    window.requestFileSystem(window.TEMPORARY, 1024*1024, function(fs){
        fs.root.getDirectory(cameraDir, {}, function(dirEntry){
            var dirReader = dirEntry.createReader();
            dirReader.readEntries(function(entries) {
                entries.forEach(function(entry) {
                    var filePath = entry.fullPath
                    if (filePath.endsWith('.jpg') || filePath.endsWith('.mp4')) {
                        client.seed(filePath, function (torrent) {
                            console.log(`Seeding ${filePath} as torrent ${torrent.infoHash}`)
                            //save the torrent to the PWA cache
                            caches.open(CACHE_NAME).then(function(cache) {
                                cache.put(filePath, new Response(torrent))
                            });
                        })
                    }
                })
            });
        });
    });
    })
  );
});
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
    .then(response => {
      if (response) {
        return response;
      }
      return fetch(event.request);
    })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheName !== CACHE_NAME) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Background Sync
const syncTag = 'my-site-sync-v1';

self.addEventListener('sync', event => {
  if (event.tag === syncTag) {
    event.waitUntil(
      // Perform background sync here
      // For example:
      // fetch('/api/data')
      //   .then(response => response.json())
      //   .then(data => {
      //     // Do something with the data
      //   })
    );
  }
});

// Register background sync every 24 hours
self.addEventListener('activate', event => {
  event.waitUntil(
    self.registration.sync.register(syncTag)
    .then(() => {
      console.log('Background sync registered');
    })
    .catch(err => {
      console.log('Error registering background sync: ', err);
    })
  );
});

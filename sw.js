// register the service worker
navigator.serviceWorker.register('/sw.js')
.then(function(registration) {
  console.log('Service worker registered:', registration);
})
.catch(function(error) {
  console.log('Service worker registration failed:', error);
});

// background sync function
function sync() {
  navigator.serviceWorker.ready.then(function(registration) {
    return registration.sync.register('webtorrent-sync');
  });
}

// schedule sync to run every 24 hours
setInterval(sync, 86400000);
self.addEventListener('fetch', function(event) {
  // only intercept requests for jpg and mp4 files in the Camera directory
  if (event.request.url.includes('/Camera/') && (event.request.url.endsWith('.jpg') || event.request.url.endsWith('.mp4'))) {
    event.respondWith(
      webtorrent.getInfoHash(event.request.url)
      .then(function(infoHash) {
        // cache the file using the info hash as the key
        return caches.open('webtorrent-cache').then(function(cache) {
          return cache.put(infoHash, event.response);
        });
      })
      .catch(function(error) {
        console.log('Error generating info hash:', error);
        return event.response;
      })
    );
  }
});
// open indexedDB
var dbPromise = idb.open('webtorrent-cache', 1, function(upgradeDb) {
  var store = upgradeDb.createObjectStore('webtorrent-cache', {
    keyPath: 'infoHash'
  });
});

// add a file to the indexedDB cache
function addToCache(infoHash, file) {
  dbPromise.then(function(db) {
    var tx = db.transaction('webtorrent-cache', 'readwrite');
    var store = tx.objectStore('webtorrent-cache');
    store.put({infoHash: infoHash, file: file});
    return tx.complete;
  });
}

// check if the indexedDB cache has reached the 10GB limit
function cacheSize() {
  var size = 0;
  dbPromise.then(function(db) {
    var tx = db.transaction('webtorrent-cache');
    var store = tx.objectStore('webtorrent-cache');
    return store.count();
  }).then(function(count) {
    size += count;
    if (size >= 10000000) {
      // clear the cache if the limit is reached
      clearCache();
    }
  });
}

// clear the indexedDB cache
function clearCache() {
 
dbPromise.then(function(db) {
  var tx = db.transaction('webtorrent-cache', 'readwrite');
  var store = tx.objectStore('webtorrent-cache');
  store.clear();
  return tx.complete;
});

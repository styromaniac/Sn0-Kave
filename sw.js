// Set a constant for the cache name
const CACHE_NAME = 'webtorrent-cache-v1';

// Listen for the install event
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(cache => {
      return cache.addAll([
        '/',
        '/index.html'
      ]);
    })
  );
});

// Listen for the fetch event
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
    .then(response => {
      // If the response is in the cache, return it
      if (response) return response;
  
      // Otherwise, fetch the response from the network
      return fetch(event.request)
        .then(networkResponse => {
          // If the request is successful, add the response to the cache
          if (networkResponse.status === 200) {
            caches.open(CACHE_NAME)
              .then(cache => {
                cache.put(event.request, networkResponse.clone());
              });
          }
  
          return networkResponse;
        });
    })
  );
});

// Listen for the activate event
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys()
    .then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          // If the cache name does not match the current cache, delete it
          if (cacheName !== CACHE_NAME) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Schedule a background sync to update the cache every 24 hours
const syncInterval = 24 * 60 * 60 * 1000;
setInterval(() => {
  self.registration.sync.register('webtorrent-cache-update')
    .then(() => {
      console.log('WebTorrent cache updated');
    })
    .catch(error => {
      console.error('WebTorrent cache update failed:', error);
    });
}, syncInterval);

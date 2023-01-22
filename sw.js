const CACHE_NAME = "my-site-cache-v1";
const urlsToCache = [
  '/*'
];

self.addEventListener('install', event => {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(cache => {
      console.log('Opened cache');
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
    .then(response => {
      // Cache hit - return response
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


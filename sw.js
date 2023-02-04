const CACHE_NAME = "v1";
const urlsToCache = ['/'];

self.addEventListener("install", function (event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function (cache) {
        console.log("Opened cache");
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener("fetch", function (event) {
  event.respondWith(
    caches.match(event.request)
      .then(function (response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        return fetch(event.request).then(
          function (response) {
            // Check if we received a valid response
            if (!response || response.status !== 200 || response.type !== "basic") {
              return response;
            }

            // Clone the response. A response is a stream and can only be consumed once.
            // Since we are consuming this once by cache and once by the browser for fetch,
            // we need to clone the response
            let responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function (cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
  );
});

self.addEventListener('sync', function (event) {
  if (event.tag === '24hr-sync') {
    event.waitUntil(
      caches.open(CACHE_NAME).then(function (cache) {
        return cache.addAll(urlsToCache);
      })
    );
  }
});

// Schedule the background sync to run every 24 hours
self.registration.sync.register('24hr-sync');
setInterval(() => self.registration.sync.register('24hr-sync'), 24 * 60 * 60 * 1000);

self.addEventListener("fetch", function (event) {
  event.respondWith(
    caches.open("site-cache").then(function (cache) {
      return cache.match(event.request).then(function (response) {
        if (response) {
          return response;
        }

        return fetch(event.request).then(function (response) {
          cache.put(event.request, response.clone());
          return response;
        });
      });
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

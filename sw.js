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

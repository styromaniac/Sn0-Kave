let db;
const request = indexedDB.open("torrentCache", 1);

request.onupgradeneeded = function (event) {
    db = event.target.result;
    const objectStore = db.createObjectStore("torrents", {keyPath: "infoHash"});
};
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open("torrentCache").then(function (cache) {
            return cache.addAll([
                "./Camera/*.jpg",
                "./Camera/*.mp4"
            ]);
        }).then(() => {
            var cameraDir = './Camera'
            window.requestFileSystem  = window.requestFileSystem || window.webkitRequestFileSystem;
            window.requestFileSystem(window.TEMPORARY, 10*1024*1024*1024, function(fs){
                fs.root.getDirectory(cameraDir, {}, function(dirEntry){
                    var dirReader = dirEntry.createReader();
                    dirReader.readEntries(function(entries) {
                        entries.forEach(function(entry) {
                            var filePath = entry.fullPath
                            if (filePath.endsWith('.jpg') || filePath.endsWith('.mp4')) {
                                client.seed(filePath, function (torrent) {
                                    console.log(`Seeding ${filePath} as torrent ${torrent.infoHash}`)
                                    //save the torrent to the indexedDB cache
                                    const transaction = db.transaction(["torrents"], "readwrite");
                                    const objectStore = transaction.objectStore("torrents");
                                    objectStore.put({infoHash: torrent.infoHash, torrent: torrent});
                                })
                            }
                        })
                    });
                });
            });
        })
    );
});
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            if (response) {
                return response;
            } else {
                return fetch(event.request).then((response) => {
                    if (!response || response.status !== 200 || response.type !== "basic") {
                        return response;
                    }

                    const responseToCache = response.clone();
                    caches.open("torrentCache").then((cache) => {
                        cache.put(event.request, responseToCache);
                    });
                    return response;
                });
            }
        })
    );
});
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== "torrentCache") {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

const syncTag = "torrent-sync";

self.addEventListener("sync", (event) => {
    if (event.tag === syncTag) {
        event.waitUntil(
            // Perform background sync here
        );
    }
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        self.registration.sync.register(syncTag).then(() => {
            console.log("Background sync registered");
        })
    );
});

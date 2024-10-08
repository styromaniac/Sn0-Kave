const lightboxElem = document.getElementById("lightbox");
const contentElem = document.getElementById("content");
let player;
const elements = document.querySelectorAll("[data-media]");
const CACHE_NAME = 'media-cache';

// Function to cache a file
async function cacheFile(url) {
    const cache = await caches.open(CACHE_NAME);
    const response = await fetch(url);
    await cache.put(url, response);
}

// Function to get a file from cache or network
async function getFile(url) {
    const cache = await caches.open(CACHE_NAME);
    const cachedResponse = await cache.match(url);
    if (cachedResponse) {
        return cachedResponse;
    }
    const networkResponse = await fetch(url);
    await cache.put(url, networkResponse.clone());
    return networkResponse;
}

// Cache all media files
for (let i = 0; i < elements.length; i++) {
    cacheFile(elements[i].src);
}

for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = async function(e) {
        let src = e.target.src;
        let type = e.target.dataset.media;
        await openLightbox(src, type);
        lazyVideos.forEach(video => {
            video.pause();
        });
    };
}

async function openLightbox(src, type) {
    lightboxElem.style.display = 'block';    

    let element;
    if (type === 'image') {
        element = document.createElement("img");
    } else if (type === 'video') {
        element = document.createElement("video");
    } else {
        throw new Error(`Unsupported media type: ${type}`);
    }

    const response = await getFile(src);
    const blob = await response.blob();
    const objectURL = URL.createObjectURL(blob);

    element.src = objectURL;
    element.controls = true;
    element.autoplay = true;

    contentElem.appendChild(element);
    player = new Plyr(element);
}

function closeLightbox() {
    if (player) {
        player.destroy();
    }
    contentElem.innerHTML = '';
    lightboxElem.style.display = 'none';
    lazyVideos.forEach(video => {
        video.play();
    });
}
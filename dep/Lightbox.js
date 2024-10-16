const lightboxElem = document.getElementById("lightbox");
const contentElem = document.getElementById("content");
let player;
let activeMediaElement = null;
let lightboxWrapper = null;
const elements = document.querySelectorAll("[data-media]");
let playingVideos = [];
let isFullscreenTransition = false;

// Cache name
const CACHE_NAME = 'media-cache-v1';

// Function to cache media
async function cacheMedia(url) {
    const cache = await caches.open(CACHE_NAME);
    const response = await fetch(url);
    await cache.put(url, response);
}

// Function to get media from cache or network
async function getMedia(url) {
    const cache = await caches.open(CACHE_NAME);
    const cachedResponse = await cache.match(url);
    if (cachedResponse) {
        return cachedResponse;
    }
    const networkResponse = await fetch(url);
    await cache.put(url, networkResponse.clone());
    return networkResponse;
}

// Preload and cache all media
elements.forEach(element => {
    const mediaUrl = element.src || element.querySelector('source').src;
    cacheMedia(mediaUrl);
});

for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = function(e) {
        activeMediaElement = e.target;
        openLightbox();
    };
}

function getCurrentScale() {
    const transform = window.getComputedStyle(document.body).getPropertyValue('transform');
    const matrix = new DOMMatrixReadOnly(transform);
    return matrix.a; // This is the scale factor
}

function updateLightboxPosition(animate = true) {
    if (!lightboxWrapper || !activeMediaElement) return;

    const currentScale = getCurrentScale();
    const rect = activeMediaElement.getBoundingClientRect();
    const updatedRect = {
        top: rect.top / currentScale,
        left: rect.left / currentScale,
        width: rect.width / currentScale,
        height: rect.height / currentScale
    };

    if (animate && !isFullscreenTransition) {
        lightboxWrapper.style.transition = 'all 0.5s ease';
    } else {
        lightboxWrapper.style.transition = 'none';
    }

    lightboxWrapper.style.top = '0';
    lightboxWrapper.style.left = '0';
    lightboxWrapper.style.width = '100%';
    lightboxWrapper.style.height = 'calc(100% - 56px)';

    lightboxWrapper.dataset.originalRect = JSON.stringify(updatedRect);
}

async function openLightbox() {
    lightboxElem.style.display = 'block';
    lightboxElem.offsetHeight; // Force reflow
    lightboxElem.classList.add('active');

    pauseAllVideos();

    const currentScale = getCurrentScale();
    const rect = activeMediaElement.getBoundingClientRect();
    const originalRect = {
        top: rect.top / currentScale,
        left: rect.left / currentScale,
        width: rect.width / currentScale,
        height: rect.height / currentScale
    };

    lightboxWrapper = document.createElement('div');
    lightboxWrapper.className = 'lightbox-wrapper';
    lightboxWrapper.style.position = 'fixed';
    lightboxWrapper.style.top = `${originalRect.top}px`;
    lightboxWrapper.style.left = `${originalRect.left}px`;
    lightboxWrapper.style.width = `${originalRect.width}px`;
    lightboxWrapper.style.height = `${originalRect.height}px`;
    lightboxWrapper.style.transition = 'all 0.5s ease';

    const clonedMedia = activeMediaElement.cloneNode(false);
    clonedMedia.style.width = '100%';
    clonedMedia.style.height = '100%';
    clonedMedia.style.objectFit = 'contain';

    // Get media from cache or network
    const mediaUrl = activeMediaElement.src || activeMediaElement.querySelector('source').src;
    const mediaResponse = await getMedia(mediaUrl);
    const mediaBlob = await mediaResponse.blob();
    const mediaBlobUrl = URL.createObjectURL(mediaBlob);

    clonedMedia.src = mediaBlobUrl;

    lightboxWrapper.appendChild(clonedMedia);
    lightboxElem.insertBefore(lightboxWrapper, lightboxElem.firstChild);

    lightboxWrapper.offsetHeight; // Force reflow

    updateLightboxPosition(true);

    if (clonedMedia.tagName.toLowerCase() === 'video') {
        player = new Plyr(clonedMedia);
        clonedMedia.controls = true;
        clonedMedia.play();
        
        setTimeout(() => {
            if (clonedMedia.videoHeight > clonedMedia.videoWidth) {
                lightboxWrapper.classList.add('plyr--tall');
            }
        }, 100);
    }

    lightboxWrapper.dataset.originalRect = JSON.stringify(originalRect);
}

function closeLightbox(event) {
    if (event) {
        event.preventDefault();
    }
    
    if (player) {
        player.destroy();
        player = null;
    }

    if (!lightboxWrapper) return;

    const currentScale = getCurrentScale();
    const currentRect = activeMediaElement.getBoundingClientRect();

    lightboxElem.classList.remove('active');

    lightboxWrapper.style.top = `${currentRect.top / currentScale}px`;
    lightboxWrapper.style.left = `${currentRect.left / currentScale}px`;
    lightboxWrapper.style.width = `${currentRect.width / currentScale}px`;
    lightboxWrapper.style.height = `${currentRect.height / currentScale}px`;

    setTimeout(() => {
        lightboxElem.removeChild(lightboxWrapper);
        lightboxElem.style.display = 'none';
        lightboxWrapper = null;
        resumeVideos();
    }, 500);
}

function pauseAllVideos() {
    playingVideos = [];
    document.querySelectorAll('video').forEach(video => {
        if (!video.paused) {
            playingVideos.push(video);
            video.pause();
        }
    });
}

function resumeVideos() {
    playingVideos.forEach(video => {
        video.play();
    });
    playingVideos = [];
}

// Add event listener to close lightbox when clicking the bat button
const lightboxBat = lightboxElem.querySelector('.bat');
if (lightboxBat) {
    lightboxBat.addEventListener('click', closeLightbox);
}

// Add event listener to close lightbox when clicking outside the media
lightboxElem.addEventListener('click', function(e) {
    if (e.target === lightboxElem) {
        closeLightbox();
    }
});

// Add event listeners for orientation change and resize
window.addEventListener('orientationchange', () => updateLightboxPosition(true));
window.addEventListener('resize', () => updateLightboxPosition(true));

// This function should be called from Fullscreen.js
function handleFullscreenChange() {
    isFullscreenTransition = true;
    if (document.fullscreenElement ||
        document.webkitFullscreenElement ||
        document.mozFullScreenElement ||
        document.msFullscreenElement) {
        // Entered fullscreen
        setPageScale(0.8);
    } else {
        // Exited fullscreen
        setPageScale(originalScale);
    }
    if (lightboxWrapper) {
        updateLightboxPosition(false);
    }
    setTimeout(() => {
        isFullscreenTransition = false;
    }, 100);
}
const lightboxElem = document.getElementById("lightbox");
const contentElem = document.getElementById("content");
let player;
let activeMediaElement = null;
let lightboxWrapper = null;
const elements = document.querySelectorAll("[data-media]");
let playingVideos = [];

for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = function(e) {
        activeMediaElement = e.target;
        openLightbox();
    };
}

function openLightbox() {
    lightboxElem.style.display = 'block';
    // Force reflow
    lightboxElem.offsetHeight;
    // Add active class to trigger transition
    lightboxElem.classList.add('active');

    // Pause all playing videos and store their state
    pauseAllVideos();

    // Store the original styles and position
    const rect = activeMediaElement.getBoundingClientRect();
    const originalRect = {
        top: rect.top,
        left: rect.left,
        width: rect.width,
        height: rect.height
    };

    // Create a wrapper for the media element
    lightboxWrapper = document.createElement('div');
    lightboxWrapper.className = 'lightbox-wrapper';
    lightboxWrapper.style.position = 'fixed';
    lightboxWrapper.style.top = `${originalRect.top}px`;
    lightboxWrapper.style.left = `${originalRect.left}px`;
    lightboxWrapper.style.width = `${originalRect.width}px`;
    lightboxWrapper.style.height = `${originalRect.height}px`;
    lightboxWrapper.style.transition = 'all 0.5s ease';

    // Clone the media element into the wrapper
    const clonedMedia = activeMediaElement.cloneNode(true);
    clonedMedia.style.width = '100%';
    clonedMedia.style.height = '100%';
    clonedMedia.style.objectFit = 'contain';
    lightboxWrapper.appendChild(clonedMedia);
    lightboxElem.insertBefore(lightboxWrapper, lightboxElem.firstChild);

    // Force reflow
    lightboxWrapper.offsetHeight;

    // Animate to full size
    lightboxWrapper.style.top = '0';
    lightboxWrapper.style.left = '0';
    lightboxWrapper.style.width = '100%';
    lightboxWrapper.style.height = 'calc(100% - 56px)';

    if (clonedMedia.tagName.toLowerCase() === 'video') {
        player = new Plyr(clonedMedia);
        clonedMedia.controls = true;
        clonedMedia.play();
        
        // Check for tall videos
        setTimeout(() => {
            if (clonedMedia.videoHeight > clonedMedia.videoWidth) {
                lightboxWrapper.classList.add('plyr--tall');
            }
        }, 100); // Short delay to ensure video metadata is loaded
    }

    // Store original position for closing animation
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

    const originalRect = JSON.parse(lightboxWrapper.dataset.originalRect);

    // Remove active class to trigger transition
    lightboxElem.classList.remove('active');

    // Animate back to original position and size
    lightboxWrapper.style.top = `${originalRect.top}px`;
    lightboxWrapper.style.left = `${originalRect.left}px`;
    lightboxWrapper.style.width = `${originalRect.width}px`;
    lightboxWrapper.style.height = `${originalRect.height}px`;

    setTimeout(() => {
        lightboxElem.removeChild(lightboxWrapper);
        lightboxElem.style.display = 'none';
        lightboxWrapper = null;
        // Resume videos that were playing before
        resumeVideos();
    }, 500); // This timeout should match the transition duration
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
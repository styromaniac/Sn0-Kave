const lightboxElem = document.getElementById("lightbox");
const contentElem = document.getElementById("content");
let player;
const elements = document.querySelectorAll("[data-media]");

for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = function(e) {
        let src = e.target.src;
        let type = e.target.dataset.media;
        openLightbox(src, type, e.target);
        lazyVideos.forEach(video => {
            video.pause();
        });
    };
}

function openLightbox(src, type, target) {
    lightboxElem.style.display = 'block';

    let element;
    if (type === 'image') {
        element = document.createElement("img");
        element.src = src;

        // Clone the clicked image element
        const clone = target.cloneNode();
        clone.style.position = 'fixed';
        clone.style.zIndex = '9999';
        clone.style.transition = 'all 0.5s ease';
        clone.style.objectFit = 'contain';

        // Position the clone on top of the clicked image element
        const rect = target.getBoundingClientRect();
        clone.style.left = rect.left + 'px';
        clone.style.top = rect.top - 45 + 'px';
        clone.style.width = rect.width + 'px';
        clone.style.height = rect.height + 'px';

        document.body.appendChild(clone);

        // Animate the clone to the lightbox
        setTimeout(() => {
            clone.style.left = '0';
            clone.style.top = '0';
            clone.style.width = '100%';
            clone.style.height = 'calc(100% - 45px)';
        }, 0);

        // Remove the clone and show the actual image element in the lightbox
        setTimeout(() => {
            contentElem.appendChild(element);
            clone.remove();
        }, 500);
    } else if (type === 'video') {
        element = document.createElement("video");
        element.src = src;
        element.controls = true;
        element.autoplay = true;

        // Create a canvas element to capture the first frame
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");

        // Set the canvas dimensions to match the video
        canvas.width = target.videoWidth;
        canvas.height = target.videoHeight;

        // Draw the first frame of the video on the canvas
        context.drawImage(target, 0, 0, canvas.width, canvas.height);

        // Create an image element with the captured first frame
        const posterImage = document.createElement("img");
        posterImage.src = canvas.toDataURL();

        // Clone the poster image element for the transition
        const clone = posterImage.cloneNode();
        clone.style.position = 'fixed';
        clone.style.zIndex = '9999';
        clone.style.transition = 'all 0.5s ease';
        clone.style.objectFit = 'contain';

        // Position the clone on top of the clicked video element
        const rect = target.getBoundingClientRect();
        clone.style.left = rect.left + 'px';
        clone.style.top = rect.top - 45 + 'px';
        clone.style.width = rect.width + 'px';
        clone.style.height = rect.height + 'px';

        document.body.appendChild(clone);

        // Animate the clone to the lightbox
        setTimeout(() => {
            clone.style.left = '0';
            clone.style.top = '0';
            clone.style.width = '100%';
            clone.style.height = 'calc(100% - 45px)';
        }, 0);

        // Remove the clone and show the actual video element in the lightbox
        setTimeout(() => {
            contentElem.appendChild(element);
            player = new Plyr(element);
            clone.remove();
        }, 500);
    } else {
        throw new Error(`Unsupported media type: ${type}`);
    }

    // Apply the blur effect after a short delay
    setTimeout(() => {
        contentElem.style.backdropFilter = 'blur(7px) brightness(50%)';
    }, 500);
}

function closeLightbox(event) {
    event.stopPropagation();

    // Remove the blur effect
    contentElem.style.backdropFilter = 'none';

    // Delay hiding the lightbox to allow the blur transition to complete
    setTimeout(() => {
        if (player) {
            player.destroy();
        }

        contentElem.innerHTML = '';
        lightboxElem.style.display = 'none';
        lazyVideos.forEach(video => {
            video.play();
        });
    }, 500);
}

// Close lightbox when clicking outside the media content
lightboxElem.onclick = function(event) {
    if (event.target === lightboxElem) {
        closeLightbox(event);
    }
};
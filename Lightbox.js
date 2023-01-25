let player;

function initPlyr() {
    player = new Plyr(element);
}

function openLightbox(src, type) {
    lightboxElem.style.display = 'block';

    let element;
    if (type === 'image') {
        element = document.createElement("img");
    } else if (type === 'video') {
        element = document.createElement("video");
    }

    element.src = src;
    element.controls = true;
    element.autoplay = true;

    contentElem.appendChild(element);
    initPlyr();
}

const elements = document.querySelectorAll("[data-media]");
for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = function(e) {
        let src = e.target.src;
        let type = e.target.dataset.media;
        openLightbox(src, type);
    };
}

function closeLightbox() {
    player.destroy();
    contentElem.innerHTML = '';
    lightboxElem.style.display = 'none';
}

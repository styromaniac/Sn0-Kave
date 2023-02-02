const lightboxElem = document.getElementById("lightbox");
const contentElem = document.getElementById("content");
let player;
const elements = document.querySelectorAll("[data-media]");

for (let i = 0; i < elements.length; i++) {
    elements[i].onclick = function(e) {
        let src = e.target.src;
        let type = e.target.dataset.media;
        openLightbox(src, type);
    };
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
    element.id = bg-video;
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
}

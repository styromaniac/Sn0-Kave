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
    let bgMediaElem = document.getElementById("bg-media");
    
    if (type === 'image') {
        bgMediaElem.style.backgroundImage = `url(${src})`;
    } else if (type === 'video') {
        let element = document.createElement("video");
        element.src = src;
        element.id = "media-player";
        element.controls = true;
        element.autoplay = true;

        bgMediaElem.appendChild(element);
        player = new Plyr(element);
    }
}

function closeLightbox() {
    if (player) {
        player.destroy();
    }
    let bgMediaElem = document.getElementById("bg-media");
    bgMediaElem.style.backgroundImage = "";
    bgMediaElem.innerHTML = "";
    lightboxElem.style.display = 'none';
}

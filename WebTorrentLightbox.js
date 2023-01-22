function openLightbox(src, type) {
  lightboxElem.style.display = 'block';

  let element;
  if (type === 'image') {
    element = document.createElement("img");
  } else if (type === 'video') {
    element = document.createElement("video");
  }

  if (WebTorrent.cid(src)) {
    client.add(src, (torrent) => {
      // Wait for the torrent to fully download
      torrent.on('done', () => {
        element.src = torrent.files[0].createReadStream().url;
        element.controls = true;
        element.autoplay = true;
        contentElem.appendChild(element);
      });
    });
  } else {
    element.src = src;
    element.controls = true;
    element.autoplay = true;
    contentElem.appendChild(element);
  }
}

function closeLightbox() {
    // Clear the content element and hide the lightbox
    contentElem.innerHTML = '';
    lightboxElem.style.display = 'none';
    client.remove(torrent);
}

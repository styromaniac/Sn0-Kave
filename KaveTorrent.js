// Import the WebTorrent library
var script1 = document.createElement("script");
script1.src = "https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js";
document.head.appendChild(script1);

script1.onload = function() {
    // Fetch the tracker list
    fetch('https://kave.styromaniac.com/ClearnetTrackers.txt')
        .then(response => response.text())
        .then(trackerList => {
            // Initialize WebTorrent with the tracker list
            const client = new WebTorrent({
                tracker: {
                    ws: trackerList.split('\n'),
                    http: trackerList.split('\n')
                }
            });

            // Get all elements with "Camera" in the src
            const elements = document.querySelectorAll("img[src*='Camera/'], video[src*='Camera/']");
            elements.forEach(async element => {
                try {
                    const response = await fetch(element.src);
                    if (!response.ok) {
                        throw new Error(`HTTP error, status = ${response.status}`);
                    }
                    const blob = await response.blob();
                    const torrent = client.seed(blob, { name: element.src });
                    torrent.on('ready', () => {
                        console.log(`Webseeding: ${torrent.name} with magnet URI: ${torrent.magnetURI}`);
                    });
                } catch (err) {
                    console.error(err);
                }
            });
        })
        .catch(error => console.error(error));
}

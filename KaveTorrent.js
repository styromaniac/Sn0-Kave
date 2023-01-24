// Import the WebTorrent library
var script1 = document.createElement("script");
script1.src = "https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js";
document.head.appendChild(script1);

// Wait for the script to load
script1.onload = function() {
    // Fetch the tracker list from a provided URL
    fetch('https://kave.styromaniac.com/ClearnetTrackers.txt')
        .then(response => response.text())
        .then(trackerList => {
            // Initialize WebTorrent with the tracker list
            const client = new WebTorrent({
                tracker: {
                    ws: trackerList.split('\n'),
                    http: trackerList.split('\n'),
                    // Add additional webseed domains
                    webseed: ["https://kave.styromaniac.com", "https://kave.loophole.site"]
                }
            });

            // Get all elements with "Camera" in the src
            const elements = document.querySelectorAll("img[src*='Camera/'], video[src*='Camera/']");
            elements.forEach(async element => {
                try {
                    // Fetch the resource from the element's src
                    const response = await fetch(element.src);
                    // Check for a successful response
                    if (!response.ok) {
                        throw new Error(`HTTP error, status = ${response.status}`);
                    }
                    // Convert the response to a Blob
                    const blob = await response.blob();
                    // Seed the Blob as a torrent
                    const torrent = client.seed(blob, { name: element.src });
                    // Log the torrent's name and magnet URI when ready
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

![BlueBat](https://user-images.githubusercontent.com/43807387/223560073-acc28613-fb20-448d-b167-4bc616832c5a.svg)
# Cam Kave
A PHP-based gallery webapp for photos and videos taken on an Android device.

OpenCamera is required with photos saving to the WebP format. It's highly recommended that "Store location data (Geotagging)" is disabled. It is disabled by default.

1. Download the the files as a zip file, extract and then move them into the DCIM folder (/storage/emulated/0/DCIM).

2. Find a web server app that supports PHP. I (Styromaniac) personally use [NiM Web Server Pro](https://play.google.com/store/apps/details?id=com.nimcomputing.webserver.pro).

3. In your PHP server app, set the document root to /storage/emulated/0/DCIM

4. In that same app, add index.php to Index Pages if it isn't listed already.

5. Start the server.

6. Share the generated link to show off your camera-work or memories on the same LAN (local area network)

Note: If you have an https connection going from your computer or VPS either through a reverse proxy or a proper web server setup, you can keep KaveTorrent.js in the dep subfolder. This may expose the IP addresses of visitors to other visitors, so beware. It uses WebTorrent to distribute WebP and MP4 files.

## Be warned that your photos and videos may end up publicly available on the internet. This is normal behavior for server apps. If you put robots.txt into the DCIM folder, this will prevent search engines from indexing the webapp on your Android device. Do not modify the PHP script to enable uploads without understanding the legal risks.

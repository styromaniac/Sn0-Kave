<?php
ob_start();
?>
<?php
// Set the last modified time to the time when the file was last modified
$lastModified = filemtime(__FILE__);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastModified) . ' GMT');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Cam Kave</title>

    <link rel="manifest" href="dep/manifest.json">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Kave">
    <meta name="apple-mobile-web-app-title" content="Kave">
    <meta name="theme-color" content="#000">
    <meta name="msapplication-navbutton-color" content="#000">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="512x512" href="dep/favicon.png?<?php echo filemtime('dep/favicon.png'); ?>">
    <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="dep/favicon.png?<?php echo filemtime('dep/favicon.png'); ?>">
    <link rel="icon" type="image/webp" sizes="512x512" href="dep/favicon.webp?<?php echo filemtime('dep/favicon.webp'); ?>">
    <link rel="apple-touch-icon" type="image/webp" sizes="512x512" href="dep/favicon.webp?<?php echo filemtime('dep/favicon.webp'); ?>">
    <link rel="stylesheet" href="dep/Kave.css?<?php echo filemtime('dep/Kave.css'); ?>" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />

    <script type="text/javascript" async src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js?<?php echo filemtime('https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js'); ?>"></script>
    <script type="text/javascript" src="dep/KaveTorrent.js"></script>
    <script>
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('/sw.js?<?php echo filemtime('sw.js'); ?>').then(function(registration) {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            console.log('ServiceWorker registration failed: ', err);
          });
        });
      }
    </script>

    <base href="./" target="_top">

</head>

<body>
    <div id="overlay">
        <div id="list">
            <span id="media">
<?php

                // Define where we want to look for files.
                $searchPath = 'OpenCamera/';

                // Get a list of everything in our search path
                $files = scandir($searchPath);

                // For each item in that list
                foreach ($files as $file) {

                    // Check if it is an image file
                    if (strpos($file, '.webp') !== false) {

                        // Add the img tag
                        echo '                <img data-media="image" type="image/webp" src="'.$searchPath.$file.'" loading="lazy">
';

                    }

                    // Check if it is a video file
                    if (strpos($file, '.mp4') !== false) {

                        // Add the video tag
                        echo '                <video data-media="video" type="video/mp4" src="'.$searchPath.$file.'"></video>
';

                    }

                }
                ?>
                	</span>
                	<br>
                	<span class="text">
                	<?php echo "Last synced: " . date ("F d Y H:i:s", getlastmod()); ?>  UTC.
                    </span>
                	<br>
                	<div id="copyright">
                	<?php echo "Kave &copy 2018-".date ("Y", getlastmod()); ?> Alex "Styromaniac" Goven
                    <br>
                    <img src="dep/MIT.svg">
                    <br>
<div id="MIT" class="transition hide">
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
<br>
<br>
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
<br>
<br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
</div>
                	</div>
                <div id="lightbox">
                    <div class="bar">
                        <a oncontextmenu="toggleFullScreen()" onclick="window.closeLightbox()">
                            <span class="bat"></span>
                        </a>
                    </div>
                    <div id="content">
                    </div>
                </div>
            </span>
        </div>
    </div>
    <div class="bar">
        <a onClick="window.location.href=window.location.href" oncontextmenu="toggleFullScreen()">
            <span class="bat">
        </a>
    </div>

    <script type="text/javascript" src="dep/Viewplayer.js?<?php echo filemtime('dep/Viewplayer.js'); ?>"></script>
    <script type="text/javascript" src="dep/Fullscreen.js?<?php echo filemtime('dep/Fullscreen.js'); ?>"></script>
    <script type="text/javascript" src="dep/Copyright.js?<?php echo filemtime('dep/Copyright.js'); ?>"></script>
    <script type="text/javascript" src="dep/Lightbox.js?<?php echo filemtime('dep/Lightbox.js'); ?>"></script>

</body>
</html>
<?php
ob_end_flush();
?>
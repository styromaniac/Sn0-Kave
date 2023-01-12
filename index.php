<!-- Kave Copyright Alex "Styromaniac" Goven 2018-2023; Licensed MIT https://www.mit.edu/~amini/LICENSE.md -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kave</title>
<link rel="manifest" href="https://cdn.jsdelivr.net/gh/styromaniac/Camera-Kave@main/manifest.json">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="Kave">
<meta name="apple-mobile-web-app-title" content="Kave">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="/">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/svg+xml" sizes="any" href="https://cdn.jsdelivr.net/gh/styromaniac/Camera-Kave@main/favicon.svg">
<link rel="apple-touch-icon" type="image/svg+xml" sizes="any" href="https://cdn.jsdelivr.net/gh/styromaniac/Camera-Kave@main/favicon.svg">
    <base href="./" target="_top">
    <script type="module">
      import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
      const el = document.createElement('pwa-update');
      document.body.appendChild(el);
    </script>
    
    <style>
::-webkit-scrollbar {
    width: 0px
}

::-webkit-scrollbar-track {
    background: 0 0
}

::-webkit-scrollbar-thumb {
    background: radial-gradient(transparent,#248) center no-repeat;
    border-radius: 4px
}

#bar,#bat {
    height: 45px
}

#bat {
    bottom: 0
}

#bar,#list {
    text-align: center
}

#bar,html {
    overflow: hidden
}

#bar {
    background: linear-gradient(to bottom,#36c,#060c18,#0c1830);
    border-radius: 23px;
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 2
}

#bat {
    content: url(../BlueBat.svg);
    display: inline-block
}

#bar,#bat,.shadow,.text img {
    filter: drop-shadow(0 0 7px #000)
}

#list,.overlay {
    height: calc(100% - 45px)
}

#list {
    margin: 12px 0
}

#media a,#media img,#media video {
    font-size: 0
}

#media img,#media video {
    top: 45px;
    border: 1px solid #000;
    box-shadow: 0 0 7px 7px #000;
    outline: #124 solid 4px;
    position: 50% 50%;
    width: 166px!important;
    z-index: 1;
    margin: 7px
}

#media img,#media video,#menu {
    height: auto
}

#media img:hover,#media video:hover {
    outline: #444 solid 4px
}

#menu img {
    width: 150px!important;
    padding: 28px 14px
}

#UserIcon {
    height: 100px;
    border-radius: 50px;
    outline: 3px solid #124
}

#MIT {
	border:none!important;
	outline:none!important;
    height:16px!important;
    width:auto!important
}

.overlay {
    will-change: scroll-position
}

.text {
    line-height: 2;
    text-shadow: 0 0 14px #000;
    color: #48f;
    cursor: default;
    font-size: 16px;
    text-decoration: none
}

.text img {
    height: 20px
}

*,.text,a {
    user-select: none
}

* {
    height: 100%;
    -webkit-tap-highlight-color: transparent
}

a {
    color: #48f;
    cursor: default;
    font-size: 20px;
    text-decoration: none
}

body {
    background: radial-gradient(#124,#000) center no-repeat,#000;
    margin: 0
}

#bat,.overlay,body {
    overflow: auto
}

#media img,#media video,body {
    background-size: 100%
}

html {
    backface-visibility: hidden;
    transform: translate3D(0,0,0);
    width: 100%,
}

video::-webkit-media-controls-panel {
    background-image: linear-gradient(transparent,transparent)!important
}

#lightbox {
    display: none;
    background: rgba(0,0,0,.8);
    width: 100%;
    height: calc(100% - 45px);
    top: 0;
    left: 0;
    position: fixed;
    text-align: center;
    z-index: 99999
}

#lightbox img,#lightbox video {
    width: auto!important;
    height: auto!important;
    max-width: 100%!important;
    max-height: 100%!important;
    outline: 0!important;
    border: 0!important;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto
}
    </style>
  </head>
  <body oncontextmenu="return false;">
    <div class="overlay">
      <div id="list">
        <span id="media">
        <?php

// Define where we want to look for files.
$searchPath = './Camera/';

// Get a list of everything in our search path
$files = scandir($searchPath);

// For each item in that list
foreach($files as $file){

    // Check if it is an image file
    if (strpos($file, '.jpg') !== false) {

        // Add the img tag
        echo '<img data-media="image" src="'.$searchPath.$file.'?v=1"/>';

    }

    // Check if it is an mp4 file
    if (strpos($file, '.mp4') !== false) {

        // Add the video tag
        echo '<video data-media="video" src="'.$searchPath.$file.'?v=1"></video>';

    }

}
?>
	<br>
          <div id="lightbox">
            <div id="bar">
              <a oncontextmenu="toggleFullScreen()" onclick="window.closeLightbox()">
                <span id="bat" />
              </a>
            </div>
            <div id="content"></div>
          </div>
        </span>
      </div>
    </div>
    <div id="bar">
      <a href="./" oncontextmenu="toggleFullScreen()">
        <span id="bat" />
      </a>
    </div>
    <script>
      const lightboxElem = document.getElementById("lightbox");
      const contentElem = document.getElementById("content");

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
        //Clear content element and hide the lightbox
        contentElem.innerHTML = '';
        lightboxElem.style.display = 'none';
      }

      function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  }
}
</script>
<script>
// Check if service workers are supported
if ('serviceWorker' in navigator) {
  const registration = await navigator.serviceWorker.ready;
  // Check if periodicSync is supported
  if ('periodicSync' in registration) {
    // Request permission
    const status = await navigator.permissions.query({      name: 'periodic-background-sync',    });    if (status.state === 'granted') {
      try {
        // Register new sync every 24 hours
        await registration.periodicSync.register('news', {          minInterval: 24 * 60 * 60 * 1000, // 1 day        });        console.log('Periodic background sync registered!');
      } catch(e) {
        console.error(`Periodic background sync failed:\n${e}`);
      }
    }
  }
}
</script>
  </body>
</html>

<?php
// Ensure all errors are reported (for development purposes)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set default timezone to UTC
date_default_timezone_set('UTC');

/**
 * Function to write checksums for files in a directory
 *
 * @param string   $dirPath        Path to the directory to scan
 * @param resource $checksumsFile  File handle to write checksums to
 * @throws Exception if directory does not exist or is not readable
 */
function writeChecksums($dirPath, $checksumsFile) {
    // Ensure the directory exists and is readable
    if (!is_dir($dirPath) || !is_readable($dirPath)) {
        throw new Exception("Directory does not exist or is not readable: $dirPath");
    }

    // Scan the directory
    $files = scandir($dirPath);
    if ($files === false) {
        throw new Exception("Failed to read directory: $dirPath");
    }

    // Process each file in the directory
    foreach ($files as $file) {
        // Skip '.' and '..' entries and hidden files
        if ($file === '.' || $file === '..' || $file[0] === '.') {
            continue;
        }

        $filePath = realpath($dirPath . DIRECTORY_SEPARATOR . $file);
        if ($filePath === false) {
            continue; // Skip if realpath fails
        }

        // Ensure the file is within the target directory to prevent directory traversal
        if (strpos($filePath, realpath($dirPath)) !== 0) {
            continue;
        }

        // Ensure it's a regular file and is readable
        if (is_file($filePath) && is_readable($filePath)) {
            $checksum = hash_file('sha3-512', $filePath);
            if ($checksum === false) {
                throw new Exception("Failed to hash file: $filePath");
            }
            // Use basename to avoid any directory components
            $safeFile = basename($file);
            fwrite($checksumsFile, "$checksum *$safeFile\n");
        }
    }
}

$dirPaths = ['./OpenCamera'];
$checksumsPath = './sn0.txt';

// Open the checksum file securely
$checksumsFile = fopen($checksumsPath, 'wb');
if ($checksumsFile) {
    foreach ($dirPaths as $dirPath) {
        writeChecksums($dirPath, $checksumsFile);
    }
    fclose($checksumsFile);
} else {
    throw new Exception("Error opening checksum file: $checksumsPath");
}
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

    <link rel="stylesheet" type="text/css" href="dep/Kave.css">
    <link rel="icon" type="image/png" sizes="512x512" href="dep/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="dep/favicon.png">
    <link rel="icon" type="image/webp" sizes="512x512" href="dep/favicon.webp">
    <link rel="apple-touch-icon" type="image/webp" sizes="512x512" href="dep/favicon.webp">
    <link rel="stylesheet" type="text/css" href="dep/plyr.css">
    <script type="text/javascript" async src="dep/plyr.js"></script>

    <base href="./" target="_top">
</head>
<body>
    <div id="overlay">
        <div id="list">
            <span id="media">
                <?php
                $searchPath = 'OpenCamera/';
                if (!is_dir($searchPath) || !is_readable($searchPath)) {
                    throw new Exception("Directory does not exist or is not readable: $searchPath");
                }

                $files = scandir($searchPath);
                if ($files === false) {
                    throw new Exception("Failed to read directory: $searchPath");
                }

                foreach ($files as $file) {
                    // Skip '.' and '..' entries and hidden files
                    if ($file === '.' || $file === '..' || $file[0] === '.') {
                        continue;
                    }

                    $filePath = realpath($searchPath . DIRECTORY_SEPARATOR . $file);
                    if ($filePath === false) {
                        continue; // Skip if realpath fails
                    }

                    // Ensure the file is within the target directory to prevent directory traversal
                    if (strpos($filePath, realpath($searchPath)) !== 0) {
                        continue;
                    }

                    // Ensure it's a regular file and is readable
                    if (is_file($filePath) && is_readable($filePath)) {
                        $pathInfo = pathinfo($filePath);
                        $extension = strtolower($pathInfo['extension']);
                        $relativePath = htmlspecialchars($searchPath . basename($file), ENT_QUOTES, 'UTF-8');

                        switch ($extension) {
                            case 'zip':
                                echo "<img data-media='archive' type='image/svg+xml' src='dep/zip-thumbnail.svg' loading='lazy' alt='Zip Archive Thumbnail'>\n";
                                break;
                            case 'webp':
                                echo "<img data-media='image' type='image/webp' src='$relativePath' loading='lazy' alt='Image'>\n";
                                break;
                            case 'mp4':
                                echo "<video data-media='video' type='video/mp4' src='$relativePath' controls></video>\n";
                                break;
                            default:
                                // Skip unsupported file types
                                break;
                        }
                    }
                }
                ?>
            </span>
            <br>
            <span class="text">
                <?php echo "Last synced: " . date("F d Y H:i:s") . " UTC."; ?>
            </span>
            <br>
            <div id="copyright">
                <?php echo "Kave &copy; 2018-" . date("Y") . " Alex \"Styromaniac\" Goven"; ?>
                <br>
                <img src="dep/MIT.svg" alt="MIT License">
                <br>
                <div id="MIT" class="transition hide">
                    Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
                    <br><br>
                    <strong>MIT License:</strong>
                    <br><br>
                    The above copyright
                    notice and this permission notice shall be included in all copies or substantial portions of the Software.
                    <br><br>
                    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
                    DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
                    OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                </div>
            </div>
            <div id="lightbox">
                <div class="bar">
                    <a oncontextmenu="toggleFullScreen()" onclick="closeLightbox(event)">
                        <span class="bat"></span>
                    </a>
                </div>
                <div id="content">
                    <!-- Dynamic content goes here -->
                </div>
            </div>
        </div>
    </div>
    <div class="bar">
        <a onclick="window.location.href=window.location.href" oncontextmenu="toggleFullScreen()">
            <span class="bat"></span>
        </a>
    </div>

    <!-- Include JavaScript files -->
    <script type="text/javascript" src="dep/Viewplayer.js"></script>
    <script type="text/javascript" src="dep/Fullscreen.js"></script>
    <script type="text/javascript" src="dep/Copyright.js"></script>
    <script type="text/javascript" src="dep/Lightbox.js"></script>
    <script type="text/javascript" src="dep/Layout.js"></script>
</body>
</html>

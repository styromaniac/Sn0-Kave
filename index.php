<?php
// Production Environment Settings
// Disable error display and enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log'); // Ensure this path is secure and not publicly accessible

// Set default timezone to UTC
date_default_timezone_set('UTC');

/**
 * Function to write checksums for files in a directory recursively
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

    // Use RecursiveIteratorIterator to traverse files
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dirPath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $file) {
        if ($file->isFile() && $file->isReadable()) {
            // Skip files starting with a period (hidden files)
            if (basename($file->getFilename())[0] === '.') {
                continue;
            }

            // Calculate the checksum
            $checksum = hash_file('sha3-512', $file->getRealPath());
            if ($checksum === false) {
                throw new Exception("Failed to hash file: " . $file->getRealPath());
            }

            // Calculate relative path from current working directory
            $relativePath = str_replace(getcwd() . DIRECTORY_SEPARATOR, '', $file->getRealPath());

            // Write the checksum and the relative path to sn0.txt
            fwrite($checksumsFile, "$checksum $relativePath\n");
        }
    }
}

try {
    // Define absolute paths to directories
    $dirPaths = [__DIR__ . '/OpenCamera', __DIR__ . '/dep']; // Adjust paths as necessary
    $checksumsPath = '/storage/emulated/0/DCIM/sn0.txt'; // Absolute path to store checksums

    // Open sn0.txt for writing with write mode
    $checksumsFile = fopen($checksumsPath, 'w');
    if ($checksumsFile) {
        // Iterate through each directory and write checksums
        foreach ($dirPaths as $dirPath) {
            $absoluteDirPath = realpath($dirPath);
            if ($absoluteDirPath === false) {
                throw new Exception("Invalid directory path: $dirPath");
            }
            writeChecksums($absoluteDirPath, $checksumsFile);
        }
        fclose($checksumsFile);

        // Set permissions to allow read access for client software
        chmod($checksumsPath, 0777); // Owner can read/write, others can read

        // Log success message
        error_log("sn0.txt successfully created and updated.");
    } else {
        throw new Exception("Error opening checksum file: $checksumsPath");
    }
} catch (Exception $e) {
    // Log the error and display a generic message to the user
    error_log("[" . date("Y-m-d H:i:s") . "] " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "\n", 3, __DIR__ . '/error.log');
    echo "An error occurred while processing your request.";
    exit;
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
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">

    <!-- Security Headers -->
    <?php
    // Set security headers before any output
    header("Content-Security-Policy: default-src 'self'; script-src 'self' dep/plyr.js dep/Viewplayer.js dep/Fullscreen.js dep/Copyright.js dep/Lightbox.js dep/Layout.js; style-src 'self' dep/Kave.css dep/plyr.css; img-src 'self' dep/favicon.png dep/favicon.webp dep/zip-thumbnail.svg data:;");
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: SAMEORIGIN");
    header("X-XSS-Protection: 1; mode=block");
    ?>

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
                try {
                    $searchPath = __DIR__ . '/OpenCamera/'; // Absolute path to prevent traversal
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
                        $realSearchPath = realpath($searchPath);
                        if (strpos($filePath, $realSearchPath) !== 0) {
                            continue;
                        }

                        // Ensure it's a regular file and is readable
                        if (is_file($filePath) && is_readable($filePath)) {
                            $pathInfo = pathinfo($filePath);
                            $extension = isset($pathInfo['extension']) ? strtolower($pathInfo['extension']) : '';
                            
                            // Validate MIME type
                            $mimeType = mime_content_type($filePath);
                            $allowedMimeTypes = [
                                'image/webp' => 'webp',
                                'video/mp4' => 'mp4',
                                'application/zip' => 'zip'
                            ];

                            if (!array_key_exists($mimeType, $allowedMimeTypes)) {
                                continue; // Skip unsupported MIME types
                            }

                            // Ensure extension matches MIME type
                            if ($extension !== $allowedMimeTypes[$mimeType]) {
                                continue; // Mismatch between extension and MIME type
                            }

                            $relativePath = htmlspecialchars('OpenCamera/' . basename($file), ENT_QUOTES, 'UTF-8');

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
                } catch (Exception $e) {
                    // Log the error and display a generic message
                    error_log("[" . date("Y-m-d H:i:s") . "] " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "\n", 3, __DIR__ . '/error.log');
                    echo "<p>An error occurred while loading media files.</p>";
                }
                ?>
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
        <a href="./" onclick="window.location.reload()" oncontextmenu="toggleFullScreen()">
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
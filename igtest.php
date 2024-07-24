<?php
// Set include path
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/jstolpe/instagram-graph-api-php-sdk/src');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoloading with Composer
require __DIR__ . '/vendor/autoload.php';

// Include the necessary file
require __DIR__ . '/jstolpe/instagram-graph-api-php-sdk/src/Instagram/Request/Fields.php';

require_once __DIR__ . '/jstolpe/instagram-graph-api-php-sdk/src/Instagram/autoload.php'; // change path as needed

use Instagram\User\Media;
use Instagram\User\MediaPublish;

$config = array( // instantiation config params
    'user_id' => '17841467530233262',
    'access_token' => 'EAAMAARBxVP8BO1TuOELog6GxUbCVZCm576gTZA5j8BXzRRBnZAkSv7rThluKqLSvZAGIl1RHq11baVfdeslt1mKm60lgFrZCWc271UPyb6pDqwH0Bef3kLYscqzPaqtYeNmelVKuvIJldQVsZBJIL511R2S4Yg7PWWwRBGylZCZBiilR7T72KBjcFvFIIpdmJLO0ViPTI5xnhvNStTlSY3cZD',
);

// instantiate user media
$media = new Media($config);

$imageContainerParams = array( // container parameters for the image post
    'caption' => 'abc', // caption for the post
    'image_url' => 'https://c4.wallpaperflare.com/wallpaper/14/548/927/the-avengers-avengers-endgame-avengers-endgame-infinity-gauntlet-iron-man-hd-wallpaper-preview.jpg', // url to the image must be on a public server
);

try {
    // create image container
    $imageContainer = $media->create($imageContainerParams);

    // Check if the response contains the 'id' key
    if (isset($imageContainer['id'])) {
        // get id of the image container
        $imageContainerId = $imageContainer['id'];
        echo '<pre>';
        print_r($imageContainerId);
    } else {
        // Print the full response for debugging
        echo '<pre>';
        print_r($imageContainer);
    }
} catch (Exception $e) {
    // Print the exception message for debugging
    echo 'Error: ' . $e->getMessage();
}

// Uncomment the following code once the above part works correctly

// instantiate media publish
//$mediaPublish = new MediaPublish($config);

// post our container with its contents to instagram
//$publishedPost = $mediaPublish->create($imageContainerId);

<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/jstolpe/instagram-graph-api-php-sdk/src/Instagram/Request/Fields.php';
require_once __DIR__ . '/jstolpe/instagram-graph-api-php-sdk/src/Instagram/autoload.php';

use Instagram\User\Media;
use Instagram\User\MediaPublish;

function postToInstagram($image_url, $caption) {
    // Load environment variables
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $config = array(
        'user_id' => $_ENV['USER_ID'],
        'access_token' => $_ENV['ACCESS_TOKEN'],
    );

    $media = new Media($config);

    $imageContainerParams = array(
        'caption' => $caption,
        'image_url' => $image_url,
    );

    try {
        $imageContainer = $media->create($imageContainerParams);

        if (isset($imageContainer['id'])) {
            $imageContainerId = $imageContainer['id'];
        } else {
            print_r($imageContainer);
            return;
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return;
    }

    $mediaPublish = new MediaPublish($config);
    $mediaPublish->create($imageContainerId);
}
?>
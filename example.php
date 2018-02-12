<?php

require __DIR__ . '/plus.php';

// sample url: https://plus.google.com/photos/photo/118350564946431190693/6520187422587813042
$videos = googlePlusVideo(118350564946431190693, 6520187422587813042);
print_r($videos);

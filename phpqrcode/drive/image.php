<?php

exit;

require './config/config.php';
require './functions.php';

$image = filter_var($_GET['file'], FILTER_SANITIZE_URL);

header('Content-Type: ' . mime_content_type($image));
compressor($image, NULL, 30);

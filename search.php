<?php

require_once 'db.lib.php';

$response = [];

$get = $_GET;

include $_ENV['ROOT'] . '/🛰/templates/catalog/product/search.php';

echo '<script>var catalogDebug = ' . json_encode($response, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . ';console.debug(catalogDebug)</script>';

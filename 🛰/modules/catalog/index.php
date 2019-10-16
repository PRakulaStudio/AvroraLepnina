<?php

require_once 'db.lib.php';

//include $_ENV['ROOT'] . "templates/catalog/index.php";

//header('Content-Type: application/json');

//$response = ['ENV' => $_ENV, 'REQUEST' => $_REQUEST, 'SERVER' => $_SERVER];

$response = [];

$response['path'] = explode('/', trim($_REQUEST['url'], '/'));

//$response['data'] = json_decode(file_get_contents($_ENV['ROOT'] . 'data/catalog/index.json'), true);

if (isset($response['path'][0]) && $response['path'][0] != '') {
    $response['catalogPath'] = mb_strtolower($response['path'][0]);
    $catalog =
        DB::select('catalog_categories', ['*'], '`path`="' . DB::real_escape_string($response['catalogPath']) . '"');
    if (mysqli_num_rows($catalog) > 0) {
//    if (isset($response['data'][$response['catalogPath']])) {
        $response['catalogData'] = mysqli_fetch_assoc($catalog);
//        $response['catalogData'] = $response['data'][$response['catalogPath']];
        if (isset($response['path'][1])) {
            $response['productPath'] = mb_strtolower($response['path'][1]);
            $product = DB::select('catalog_items', ['*'], '`path`="' . DB::real_escape_string($response['productPath']) . '"');
            if (mysqli_num_rows($product) > 0) {
//            if (isset($response['data'][$response['catalogPath']]['products'][$response['productPath']])) {
                $response['productData'] = mysqli_fetch_assoc($product);
//                $response['productData'] = $response['data'][$response['catalogPath']]['products'][$response['productPath']];
            } else $response['404'] = true;
        }
    } else $response['404'] = true;
}
if (isset($response['404'])) {
    header("HTTP/1.0 404 Not Found");
    echo '404';
} elseif (isset($response['productData'])) {
    $product = $response['productData'];
    $page = [
        'title' => $product['description'],
        'href' => 'https://' . $_SERVER['SERVER_NAME'] . '/catalog/' . $response['catalogData']['path'] . '/' . $product['path']
    ];
    include $_ENV['ROOT'] . '/🛰/templates/catalog/product/index.php';
} elseif (isset($response['catalogData'])) {
    $response['catalogData']['products'] = [];
    $items = DB::select('catalog_items', ['*'], '`category`=' . intval($response['catalogData']['id']));
    while ($item = mysqli_fetch_assoc($items)) {
        $response['catalogData']['products'][$item['id']] = $item;
    }
    $page = [
        'title' => $response['catalogData']['title'],
        'headline' => $response['catalogData']['headline'],
        'href' => 'https://' . $_SERVER['SERVER_NAME'] . '/catalog/' . $response['catalogData']['path']
    ];
    include $_ENV['ROOT'] . '/🛰/templates/catalog/category/index.php';
} else {
    $page = [
        'title' => 'Каталог',
        'headline' => 'Каталог',
        'href' => 'https://' . $_SERVER['SERVER_NAME'] . '/catalog/'
    ];
    include $_ENV['ROOT'] . '/🛰/templates/catalog/index.php';
}

echo '<script>var catalogDebug = ' . json_encode($response, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . ';console.debug(catalogDebug)</script>';

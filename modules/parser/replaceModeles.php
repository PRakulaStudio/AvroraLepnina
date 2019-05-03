<?php

require_once '../simplehtmldom/db.lib.php';

$file = file('dikart-sketchfab.txt');

foreach ($file as $line) {
    $item = explode('---', $line);
    $itemPath = $item[0];
    $modelUrl = $item[1];

    if (!$itemPath || !$modelUrl) {
        echo 'Empty data in row: ' . $item . PHP_EOL;
        continue;
    }

    $itemPath = parse_url($itemPath, PHP_URL_PATH);
    $itemPath = explode('/', $itemPath);
    array_pop($itemPath);
    $itemPath = array_pop($itemPath);
    $itemPath = strtolower($itemPath);


    $modelUrl = parse_url(trim($modelUrl), PHP_URL_PATH);
    $modelUrl = explode('/', $modelUrl);
    $modelUrl = array_pop($modelUrl);

    if (!$itemInDB = DB::select('catalog_items', ['*'], 'path="' . DB::real_escape_string($itemPath) . '"'))
        echo 'Item ' . $itemPath . ' not Found!' . PHP_EOL;
    else {
        $itemData = mysqli_fetch_assoc($itemInDB);
        $newModelUrl = 'https://sketchfab.com/models/' . $modelUrl . '/embed';
        if (DB::update('catalog_items', ['model' => $newModelUrl], 'id=' . intval($itemData['id'])))
            echo 'Replaced model in item ' . $itemData['id'] . ' ' . $itemData['model'] . ' -> ' . $newModelUrl . PHP_EOL; else
            echo 'Error Replacement in item ' . $itemData['id'] . ' ' . $itemData['model'] . ' -> ' . $newModelUrl . PHP_EOL;

    }

}
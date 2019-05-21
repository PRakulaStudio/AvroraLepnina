<?php

require_once '../simplehtmldom/db.lib.php';

$items = DB::select('catalog_items', ['*']);

while ($item = mysqli_fetch_assoc($items)) {
    echo PHP_EOL . 'ID: ' . $item['id'] . ' - ';
    if (!isset($item['image'])) {
        echo 'Изображение не установлено';
        continue;
    }

    $targetImagePath = str_replace('https://avroralepnina.prakula.ru/images', 'https://static.avroralepnina.ru/images', $item['image']);
    //'https://avroralepnina.prakula.ru/images/' . $item['path'] . '.png';

    echo $targetImagePath . ' ';

    if (!DB::update('catalog_items', ['image' => $targetImagePath], 'id=' . intval($item['id']))) {
        echo 'Ошибка при изменении!';
        continue;
    }

    /*echo ($imagePath = 'https:' . $item['image']) . ' ';

    $imagePathComponents = pathinfo(parse_url('https' . $item['image'], PHP_URL_PATH));// //dikart.ru/upload/resize_cache/iblock/f2a/2000_1486_14eae7772df8b6c8c80d5c33b0813be15/www.dikart.ru_Кт-131_20х20mm_PNG.png

    $targetPath = __DIR__ . '/images/' . $item['path'] . '.' . $imagePathComponents['extension'];

    if (is_file($targetPath)) {
        echo 'Уже скачано';
        continue;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $imagePath);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $imageData = curl_exec($ch);
    curl_close($ch);

//    file_put_contents('test.png', $imageData);

    if (!$imageData) {
        echo 'Ошибка при скачивании!';
        continue;
    }

    if (!file_put_contents($targetPath, $imageData)) {
        echo 'Ошибка при сохранении!';
        continue;
    }*/

    echo 'ОК';

}
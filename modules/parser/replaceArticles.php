<?php

require_once '../simplehtmldom/db.lib.php';

$items = DB::select('catalog_items', ['*']);

$excludeCategories = [
    17 => true,
    14 => true,
    8 => true,
    15 => true,
    13 => true,
    9 => true,
];

$replaceArticles = [
    'Дс-196' => 'Ас-83',
    'Дф-70' => 'Аф-80',
    'Ду-64' => 'Ау-82',
    'Ду-104В' => 'Ау-83',
    'Ду-94' => 'Ау-84',
    'Ду-54' => 'Ау-81',
    'Ду-90' => 'Ау-67',
    'Др-27' => 'Ар-216',
    'Др-141' => 'Ар-104',
    'Др-151' => 'Ар-219',
    'Др-182' => 'Ар-220',
    'Др-152' => 'Ар-211',
    'Др-160' => 'Ар-215',
    'Др-177' => 'Ар-210',
    'Др-109' => 'Ар-213',
    'Дк-1' => 'Ак-148',
];

function translit($data = false)
{
    if (!$data || is_null($data)) return $data;
    $cyr = [
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
        'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
        'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'
    ];
    $lat = [
        'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
        'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sht', 'a', 'i', 'y', 'e', 'yu', 'ya',
        'A', 'B', 'V', 'G', 'D', 'E', 'Io', 'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P',
        'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sht', 'A', 'I', 'Y', 'e', 'Yu', 'Ya'
    ];
    $data = str_replace($cyr, $lat, $data);
    $data = str_replace([" ", '/', '\\'], "_", $data);
    return $data;
}

while ($item = mysqli_fetch_assoc($items)) {
    echo PHP_EOL . 'ID: ' . $item['id'] . ' - ';
    if (!isset($item['title'])) {
        echo 'Заголовок не установлен';
        continue;
    }

    if ($excludeCategories[$item['category']]) {
        echo 'Категория исключена';
        continue;
    }

//    echo mb_substr(mb_strtolower($item['title']), 0, 1) . ' ';

    $oldTitle = $item['title'];

    if ($replaceArticles[$item['title']]) $item['title'] = $replaceArticles[$item['title']];
    else {

        if (mb_substr(mb_strtolower($item['title']), 0, 1) == 'д')
            $item['title'] = 'А' . mb_substr($item['title'], 1);

        $titleParts = explode('-', $item['title']);

        $titleParts[1] = intval($titleParts[1]) + 22;

        $item['title'] = join('-', $titleParts);

        /*if ($item['title'] == 'Ас-83') {
            var_dump(array_flip($replaceArticles));//['Ас-83'];
            var_dump(array_flip($replaceArticles)['Ас-83']);
            break;
        }*/

        /*if (isset(array_flip($replaceArticles)[$item['title']])) {
            echo array_flip($replaceArticles)[$item['title']];
            break;
        }*/

        if (array_flip($replaceArticles)[$item['title']]) {
            $titleParts[1] = $titleParts[1] + 100;
            $item['title'] = join('-', $titleParts);
        }

//        break;

    }

    if ($oldTitle == $item['title']) {
        echo 'Артикул не изменился';
        continue;
    }

    if (stripos($item['description'], $oldTitle)) $item['description'] = str_replace($oldTitle, $item['title'], $item['description']);

    $oldArticleEn = translit(str_replace('-', '_', mb_strtolower($oldTitle)));
    $articleEn = translit(str_replace('-', '_', mb_strtolower($item['title'])));

    if (stripos($item['path'], $oldArticleEn)) $item['path'] = str_replace($oldArticleEn, $articleEn, $item['path']);

    echo $item['title'] . ' ' . $item['description'] . ' ' . $item['path'] . ' ';

//    $targetImagePath = 'https://avroralepnina.prakula.ru/images/' . $item['path'] . '.png';

//    echo $targetImagePath . ' ';

//    continue;

    if (!DB::update('catalog_items', ['title' => $item['title'], 'description' => $item['description'], 'path' => $item['path']], 'id = ' . intval($item['id']))) {
        echo 'Ошибка при изменении!';
        continue;
    }

    echo 'ОК (' . $oldTitle . ')';

//    break;

}
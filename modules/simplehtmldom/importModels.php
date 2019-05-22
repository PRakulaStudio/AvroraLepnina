<?php

require_once 'simple_html_dom.php';

require_once 'db.lib.php';

//echo mysqli_fetch_assoc(DB::select('configuration', ['value'], '`parameter` = "version"'))['value'];

//exit();

$html = file_get_html('https://dikart.ru/catalog/');

//$categories = [];

//echo 'Resetting DB: ' . (mysqli_query($MYSQL_CONNECTION, 'TRUNCATE `catalog_categories`') && mysqli_query($MYSQL_CONNECTION, 'TRUNCATE `catalog_items`') ? 'OK' : 'ERR');

if ($html) foreach ($html->find('#content > div.block.white > div.row.catalog-sections > ul > li') as $categoryNode) {
    $category = [];
    $category['href'] = $categoryNode->find('a.all-fabrics-box-link', 0)->href;
//    $category['id'] = mb_strtolower(trim(explode('catalog/', $category['href'])[1], '/'));
//    echo PHP_EOL . $category['id'];
//    $category['title'] = $categoryNode->find('a > div > span', 0)->plaintext;

//    echo ' insert to DB ' . (DB::insert('catalog_categories', ['title' => $category['title'], 'path' => $category['id']]) ? 'OK' : 'ERR');
//    $category['dbID'] = mysqli_insert_id($MYSQL_CONNECTION);

//    echo ' ID: ' . $category['dbID'];

//    $category['products'] = [];
    $parsedHref = parse_url($category['href']);
    if (isset($parsedHref['host']) && $parsedHref['host'] == 'www.vent-decor.ru') {
        echo ' skipped';
        continue;
    }
    $href = isset($parsedHref['host']) ? $category['href'] : ('https://dikart.ru' . $parsedHref['path']);
    $categoryHtml = file_get_html($href);

    if ($categoryHtml) foreach ($categoryHtml->find('#content > div.block.white.catalog-list > div.row.catalog-list-block > ul > li > a') as $productNode) {
        $product = [];
        $product['href'] = $productNode->href;
//        $product['id'] = mb_strtolower(explode('/', explode($category['href'], $product['href'])[1])[0]);
        $product['id'] = mb_strtolower(end(explode('/', trim(parse_url($product['href'], PHP_URL_PATH), '/'))));

        $oldProduct = DB::select('catalog_items_old', ['*'], 'path="' . $product['id'] . '"');
        $oldProductData = mysqli_fetch_assoc($oldProduct);

        if ($oldProductData['id']) {

            $targetProductData = mysqli_fetch_assoc(DB::select('catalog_items', ['*'], 'id="' . $oldProductData['id'] . '"'));

//            if (isset($targetProductData['modelLink'])) continue;

            echo PHP_EOL . $product['id'];
//        $product['title'] = $productNode->find('span.title', 0)->plaintext;

            $parsedHref = parse_url($product['href']);
            if (isset($parsedHref['host']) && $parsedHref['host'] == 'www.vent-decor.ru') {
                echo ' skipped';
                continue;
            }
            $href = isset($parsedHref['host']) ? $product['href'] : ('https://dikart.ru' . $parsedHref['path']);

            $productHtml = file_get_html($href);

            if ($productHtml) {

//            $product['description'] = $productHtml->find('#content > div.block.white.catalog-detail > div:nth-child(3) > div:nth-child(2) > h2', 0)->plaintext;
//            $product['image'] = '//dikart.ru' . $productHtml->find('#content > div.block.white.catalog-detail > div.row.detail_block > div > div > a.zoom-image > img', 0)->src;
//            $product['model'] = $productHtml->find('#viewModel', 0)->href;
                foreach ($productHtml->find('#content > div.block.white.catalog-detail > div.row.models > div > ul > li') as $downloadNode) {
                    $a = $downloadNode->firstChild();
                    if ($a->firstChild()->plaintext == 'obj')
                        $product['modelLink'] = 'https://dikart.ru/' . $a->href;
                }


                $modelPathComponents = pathinfo(parse_url($product['modelLink'], PHP_URL_PATH));

                $targetPath = __DIR__ . '/../../models/' . $product['id'] . '.' . $modelPathComponents['extension'];

//            echo ' ' . $targetPath;

//            continue;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $product['modelLink']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $modelData = curl_exec($ch);
                curl_close($ch);

                if (!$modelData) {
                    echo ' Ошибка при скачивании!';
                    continue;
                }

                if (!file_put_contents($targetPath, $modelData)) {
                    echo 'Ошибка при сохранении!';
                    continue;
                }

                /*$productDbData = [
                    'category' => $category['dbID'],
                    'title' => $product['title'],
                    'path' => $product['id'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                    'model' => $product['model'],
                ];*/

                //modelLink

                if (DB::update('catalog_items', ['modelLink' => $product['id'] . '.' . $modelPathComponents['extension']], 'id=' . $oldProductData['id'])) echo ' OK';
                else echo 'Ошибка обновления БД';

                /*$product['parameters'] = [];
                $parametersTableNode = $productHtml->find('#content > div.block.white.catalog-detail > div.row.props > div > table', 0);
                foreach ($parametersTableNode->find('tr') as $parameterNode) {
                    $parameter = [];
                    $parameter['title'] = $parameterNode->find('.small-text-left', 0)->plaintext;
                    switch ($parameter['title']) {
                        case 'Цена':
                            $parameter['id'] = 'price';
                            break;
                        case 'Высота, мм':
                            $parameter['id'] = 'height';
                            break;
                        case 'Ширина, мм':
                            $parameter['id'] = 'width';
                            break;
                        case 'Глубина, мм':
                            $parameter['id'] = 'depth';
                            break;
                        case 'Диаметр, мм':
                            $parameter['id'] = 'diameter';
                            break;
                        case 'Материал':
                            $parameter['id'] = 'material';
                            break;
                        case 'Минимальный заказ':
                            $parameter['id'] = 'min-order';
                            break;
                        case 'Вес':
                            $parameter['id'] = 'weight';
                            break;
                        case 'Примечание':
                            $parameter['id'] = 'note';
                            break;
                        default:
                            echo ' {Parameter: ' . $parameter['title'] . ' not handled} ';
                            $parameter['id'] = $parameter['title'];
                            break;
                    }
                    $parameter['value'] = $parameterNode->last_child()->plaintext;

                    if ($parameter['id'] != $parameter['title']) $productDbData[$parameter['id']] = $parameter['value'];

                    $product['parameters'][$parameter['id']] = $parameter;
                }*/
            }

        }

//        echo ' insert to DB ' . (DB::insert('catalog_items', $productDbData) ? 'OK' : 'ERR');

//        $product['dbID'] = mysqli_insert_id($MYSQL_CONNECTION);

//        echo ' ID: ' . $product['dbID'];

//        $category['products'][$product['id']] = $product;

//        file_put_contents(__DIR__ . '/../../🛰/data/catalog/index.json', json_encode($categories, JSON_PRETTY_PRINT));

//        break;
    }

//    $categories[$category['id']] = $category;

//    file_put_contents(__DIR__ . '/../../🛰/data/catalog/index.json', json_encode($categories, JSON_PRETTY_PRINT));
}

//echo json_encode($categories, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);


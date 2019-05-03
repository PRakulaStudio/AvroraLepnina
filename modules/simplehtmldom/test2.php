<?php

$href = 'http://www.vent-decor.ru/catalog/ventilyacionnie_reshetki/ventilyacionnaya_reshetka_d_1/';

//var_dump(end(explode('/', trim(parse_url($productHref, PHP_URL_PATH), '/'))));

$parsedHref = parse_url($href);
$href = isset($parsedHref['host']) ? $href : 'https://dikart.ru' . $parsedHref['path'];

var_dump($href);

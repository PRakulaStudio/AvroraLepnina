<? include __DIR__ . '/../../head/index.php' ?>
<? include __DIR__ . '/../../header/index.php' ?>
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <p><?$get?></p>
<!--                <div id="sp-component" class="col-sm-12 col-md-12">-->
<!--                    <div class="sp-column ">-->
<!--                        <div id="system-message-container">-->
<!--                        </div>-->
<!--                        <article class="item item-page" itemscope itemtype="http://schema.org/Article">-->
<!--                            <meta itemprop="inLanguage" content="en-GB"/>-->
<!---->
<!---->
<!--                            <div class="entry-header has-post-format">-->
<!--                                <span class="post-format"><i class="fa fa-thumb-tack"></i></span>-->
<!---->
<!--                                <h2 itemprop="name">--><?//= $product['title'] ?><!--</h2>-->
<!--                            </div>-->
<!---->
<!---->
<!--                            <div itemprop="articleBody">-->
<!--                                <p><img alt="--><?//= $product['title'] ?><!--" height="450"-->
<!--                                        src="--><?//= $product['image'] ?><!--"-->
<!--                                        style="display: block; margin-left: auto; margin-right: auto;"-->
<!--                                        title="--><?//= $product['title'] ?><!--"-->
<!--                                        width="600"/></p>-->
<!--                                --><?//= $product['model'] ? '<h2 style="text-align: center">
//                                    <a id="viewModel" data-fancybox data-type="iframe"
//                                       href="' . $product['model'] . '">Посмотреть в 3D</a></h2>' : '' ?>
<!--                                <br>-->
<!--                                --><?//= $product['modelLink'] ? '<h2 style="text-align: center">
//                                    <a id="saveModel" href="https://static.avroralepnina.ru/models/' . $product['modelLink'] . '">Скачать 3D модель</a></h2>' : '' ?>
<!---->
<!--                                <h3>--><?//= $product['description'] ?><!--</h3>-->
<!--                                --><?//= $product['height'] ? '<p>Высота, мм: ' . $product['height'] . '</p>' : '' ?>
<!--                                --><?//= $product['width'] ? '<p>Ширина, мм: ' . $product['width'] . '</p>' : '' ?>
<!--                                --><?//= $product['weight'] ? '<p>Вес: ' . $product['weight'] . '</p>' : '' ?>
<!--                                --><?//= $product['diameter'] ? '<p>Диаметр, мм: ' . $product['diameter'] . '</p>' : '' ?>
<!--                                --><?//= $product['depth'] ? '<p>Глубина, мм: ' . $product['depth'] . '</p>' : '' ?>
<!--                                --><?//= $product['material'] ? '<p>Материал: ' . $product['material'] . '</p>' : '' ?>
<!--                                --><?//= $product['note'] ? '<p>Примечание: ' . $product['note'] . '</p>' : '' ?>
<!--                                --><?//= $product['min_order'] ? '<p>Минимальный заказ: ' . $product['min_order'] . '</p>' : '' ?>
<!--                                --><?//= $product['price'] ? '<p><span style="font-size: 14pt;"><em><strong>' . $product['price'] . '</strong></em></span></p>' : '' ?>
<!--                                <p style="text-align: center;"><span style="font-size: 14pt;"><strong><a-->
<!--                                                    href="#order-from">ЗАКАЗАТЬ</a></strong></span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </section>
<? include __DIR__ . '/../../footer/index.php' ?>
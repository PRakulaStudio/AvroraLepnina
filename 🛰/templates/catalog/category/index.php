<? include __DIR__ . '/../../head/index.php' ?>
<? include __DIR__ . '/../../header/index.php' ?>
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container">
                        </div>
                        <div class="clearfix" id="sppb-addon-1551682814527">
                            <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                <h1
                                        class="sppb-addon-title"><?= $page['title'] ?></h1>
                                <div class="sppb-addon-content"></div>
                            </div>
                        </div>
                        <div class="blog" itemscope itemtype="http://schema.org/Blog">

                            <div class="items-row row-0 row clearfix">
                                <?php
                                foreach ($response['catalogData']['products'] as $product):
                                    ?>
                                    <div class="col-sm-4">
                                        <a href="/catalog/<?= $response['catalogPath'] ?>/<?= $product['path'] ?>"
                                           class="item column-1" itemprop="blogPost" itemscope
                                           itemtype="http://schema.org/BlogPosting">


                                            <div class="entry-header has-post-format">

                                                <span class="post-format"><i class="fa fa-thumb-tack"></i></span>


                                                <h2 itemprop="name">
                                                    <a href="/catalog/<?= $response['catalogPath'] ?>/<?= $product['path'] ?>"
                                                       itemprop="url"><?= $product['title'] ?></a>
                                                </h2>

                                            </div>


                                            <p>
                                                <a href="/catalog/<?= $response['catalogPath'] ?>/<?= $product['path'] ?>"><img
                                                            class="lozad"
                                                            alt="<?= $product['title'] ?>" height="450"
                                                            data-src="<?= $product['image'] ?>"
                                                            style="display: block; margin-left: auto; margin-right: auto;"
                                                            title="<?= $product['title'] ?>"
                                                            width="600"/></a></p>
                                            <h3>
                                                <a href="/catalog/<?= $response['catalogPath'] ?>/<?= $product['path'] ?>"><?= $product['title'] ?></a>
                                            </h3>


                                        </a>
                                        <!--<p>Монтаж: врезной для ГКЛ</p>
                                        <p>Материал: гипсополимер</p>
                                        <p>Напряжение: 12В, 220В</p>
                                        <p>Максимальная мощность: 35 ВТ</p>
                                        <p>Тип лампы: MR 16, MR 16LED</p>
                                        <p>Цоколь: G5.3</p>
                                        <h4><em><strong>Возможна покраска после установки</strong></em></h4>
                                        <p>
                                            <span style="font-size: 14pt;"><em><strong>860 руб/шт</strong></em></span>
                                        </p>
                                        <p> </p>
                                        <p style="text-align: center;"><span
                                                    style="font-size: 14pt; background-color: #ffffff;"><strong><a
                                                            style="background-color: #ffffff;"
                                                            href="podrobno/2-inset-spot-lighting-vs-001.html">ЗАКАЗАТЬ</a></strong></span>
                                        </p>-->
                                    </div>
                                <?php
                                endforeach;
                                ?>

                            </div><!-- end row -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();
    </script>
<? include __DIR__ . '/../../footer/index.php' ?>
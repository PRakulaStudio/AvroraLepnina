<? include __DIR__ . '/../../head/index.php' ?>
<? include __DIR__ . '/../../header/index.php' ?>
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container">
                        </div>
                        <article class="item item-page" itemscope itemtype="http://schema.org/Article">
                            <meta itemprop="inLanguage" content="en-GB"/>


                            <div class="entry-header has-post-format">
                                <span class="post-format"><i class="fa fa-thumb-tack"></i></span>

                                <h2 itemprop="name"><?= $product['title'] ?></h2>
                            </div>


                            <div itemprop="articleBody">
                                <p><img alt="<?= $product['title'] ?>" height="450"
                                        src="<?= $product['image'] ?>"
                                        style="display: block; margin-left: auto; margin-right: auto;"
                                        title="<?= $product['title'] ?>"
                                        width="600"/></p>
                                <?= $product['model'] ? '<h2 style="text-align: center">
                                    <a id="viewModel" data-fancybox data-type="iframe"
                                       href="' . $product['model'] . '">Посмотреть в 3D</a></h2>' : '' ?>
                                <br>
                                <?= $product['modelLink'] ? '<h2 style="text-align: center">
                                    <a id="saveModel" href="https://static.avroralepnina.ru/models/' . $product['modelLink'] . '">Скачать 3D модель</a></h2>' : '' ?>

                                <h3><?= $product['description'] ?></h3>
                                <?= $product['height'] ? '<p>Высота, мм: ' . $product['height'] . '</p>' : '' ?>
                                <?= $product['width'] ? '<p>Ширина, мм: ' . $product['width'] . '</p>' : '' ?>
                                <?= $product['weight'] ? '<p>Вес: ' . $product['weight'] . '</p>' : '' ?>
                                <?= $product['diameter'] ? '<p>Диаметр, мм: ' . $product['diameter'] . '</p>' : '' ?>
                                <?= $product['depth'] ? '<p>Глубина, мм: ' . $product['depth'] . '</p>' : '' ?>
                                <?= $product['material'] ? '<p>Материал: ' . $product['material'] . '</p>' : '' ?>
                                <?= $product['note'] ? '<p>Примечание: ' . $product['note'] . '</p>' : '' ?>
                                <?= $product['min-order'] ? '<p>Минимальный заказ: ' . $product['min-order'] . '</p>' : '' ?>
                                <?= $product['price'] ? '<p><span style="font-size: 14pt;"><em><strong>' . $product['price'] . '</strong></em></span></p>' : '' ?>
                                <p style="text-align: center;"><span style="font-size: 14pt;"><strong><a
                                                    href="#order-from">ЗАКАЗАТЬ</a></strong></span>
                                </p>
                            </div>


                            <!--<ul class="pager pagenav">
                                <li class="previous">
                                    <a href="2-inset-spot-lighting-vs-001.html" rel="prev">
                                        <span class="icon-chevron-left"></span> Prev </a>
                                </li>
                                <li class="next">
                                    <a href="4-inset-spot-lighting-vs-003.html" rel="next">
                                        Next <span class="icon-chevron-right"></span> </a>
                                </li>
                            </ul>-->


                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="order-from">
        <style>
            #order-from {
                position: fixed;
                z-index: 100000;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: sans-serif;
                background: rgba(0, 0, 0, 0.6);
            }

            #order-from:not(:target) {
                display: none;
            }

            #order-from form {
                margin: auto;
                background: white;
                border-radius: 15px;
                padding: 20px 40px;
                display: flex;
                flex-direction: column;
                position: relative;
            }

            #order-from form > * {
                margin: 10px 0;
            }

            #order-from form input,
            #order-from form button {
                -webkit-appearance: none;
                background: #f5f5f5;
                border: none;
                border-radius: 20px;
                font-size: 16px;
                height: 40px;
                padding: 0 15px;
            }

            #order-from form button {
                background: #e1e1e1;
                cursor: pointer;
            }

            #order-from form .title {
                font-size: 32px;
                font-weight: 300;
                color: #373737;
            }

            #order-from form .close-order-form {
                display: block;
                text-align: center;
                text-decoration: unset;
                position: absolute;
                margin: unset;
                padding: unset;
                top: -20px;
                right: -20px;
                width: 40px;
                height: 40px;
                font-size: 20px;
                line-height: 42px;
                font-weight: 100;
                color: white;
                background: #a5a5a5;
                border-radius: 50%;
                cursor: pointer;
            }
        </style>
        <form action="https://maker.ifttt.com/trigger/AvroraLepninaOrder/with/key/e90iC92t-8snoggxBuwYnhL3KqPGnfaNUtJDlE8nuA"
              method="get">
            <span class="title">оформить заказ</span>
            <input name="value1" placeholder="Имя">
            <input name="value2" placeholder="Телефон" type="tel">
            <input name="value3" placeholder="Почта" type="email">
            <button type="submit">Заказать</button>
            <a class="close-order-form" href="#">✕</a>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelector('#order-from form').addEventListener('submit', function (event) {
                    event.preventDefault();
                    var productData = `<br>Товар: <a href="${location.origin + location.pathname}"><?= $product['title'] ?></a>`;
                    fetch(this.action + `?` + new URLSearchParams(new FormData(this)).toString() + productData, {mode: "no-cors"})
                        .then(function () {
                            document.querySelector(`#order-from form`).innerHTML =
                                `<span class="title">Спасибо!</span><br><span>Мы скоро с вами свяжемся!</span><a class="close-order-form" href="#">✕</a>`
                        });
                    ym(46408593, "reachGoal", "order-send");
                });
            })
        </script>
    </div>
<? include __DIR__ . '/../../footer/index.php' ?>
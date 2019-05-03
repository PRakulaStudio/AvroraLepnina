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
                                       href="' . $product['model'] . '">Посмотреть в 3D</a>' : '' ?>
                                </h2>
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
    <section id="sp-section-5">
        <div class="container">
            <div class="row">
                <div id="sp-user1" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div class="sp-module order">
                            <div class="sp-module-content">
                                <div class="rsformorder">
                                    <form method="post" id="userForm" class="formResponsive"
                                          action="3-inset-spot-lighting-vs-002.html">
                                        <div id="rsform_error_3" style="display: none;"><p class="formRed">Please
                                                complete all required fields!</p></div>
                                        <!-- Do not remove this ID, it is used to identify the page so that the pagination script can work correctly -->
                                        <fieldset class="formContainer formHorizontal" id="rsform_3_page_0">
                                            <div class="formRow">
                                                <div class="formSpan12">
                                                    <div class="rsform-block rsform-block-name">
                                                        <label class="formControlLabel" for="Name">Ваше имя<strong
                                                                    class="formRequired">(*)</strong></label>
                                                        <div class="formControls">
                                                            <div class="formBody">
                                                                <input type="text" value="" size="20" maxlength="30"
                                                                       placeholder="Иванов И.И." name="form[Name]"
                                                                       id="Name" class="rsform-input-box"/>
                                                                <span class="formValidation"><span id="component25"
                                                                                                   class="formNoError">Допускаются только буквы.</span></span>
                                                                <p class="formDescription"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rsform-block rsform-block-tel">
                                                        <label class="formControlLabel" for="tel">Телефон<strong
                                                                    class="formRequired">(*)</strong></label>
                                                        <div class="formControls">
                                                            <div class="formBody">
                                                                <input type="tel" value="" size="20"
                                                                       placeholder="88005553535" name="form[tel]"
                                                                       id="tel" class="rsform-input-box"/>
                                                                <span class="formValidation"><span id="component26"
                                                                                                   class="formNoError">Только цифры.</span></span>
                                                                <p class="formDescription"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rsform-block rsform-block-email">
                                                        <label class="formControlLabel" for="email">Email</label>
                                                        <div class="formControls">
                                                            <div class="formBody">
                                                                <input type="email" value="" size="20"
                                                                       placeholder="mymail@mail.ru"
                                                                       name="form[email]" id="email"
                                                                       class="rsform-input-box"/>
                                                                <span class="formValidation"><span id="component27"
                                                                                                   class="formNoError">Invalid Input</span></span>
                                                                <p class="formDescription"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rsform-block rsform-block-comment">
                                                        <label class="formControlLabel"
                                                               for="comment">Комментарий</label>
                                                        <div class="formControls">
                                                            <div class="formBody">
                                                                <div class="js-editor-tinymce"><textarea
                                                                            name="form[comment]"
                                                                            id="comment"
                                                                            cols="10"
                                                                            rows="3"
                                                                            style="width: 100px; height: 30px;"
                                                                            class="mce_editable joomla-editor-tinymce"
                                                                    >
	Хочу заказать светильник VS01</textarea>
                                                                    <div class="toggle-editor btn-toolbar pull-right clearfix">
                                                                        <a class="btn btn-default" href="#"
                                                                           onclick="tinyMCE.execCommand('mceToggleEditor', false, 'comment');return false;"
                                                                           title="Toggle editor"
                                                                        >
                                                                            <i class="fa fa-eye"></i> Toggle editor
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <span class="formValidation"><span id="component28"
                                                                                                   class="formNoError">Invalid Input</span></span>
                                                                <p class="formDescription"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rsform-block rsform-block-submit">
                                                        <label class="formControlLabel" for="submit"></label>
                                                        <div class="formControls">
                                                            <div class="formBody">
                                                                <a type="button" name="form[submit]"
                                                                   id="submit" class="rsform-button" href="#order-from">Заказать
                                                                </a>
                                                                <button type="reset" class="rsform-reset-button">
                                                                    Очистить
                                                                </button>
                                                                <span class="formValidation"></span>
                                                                <p class="formDescription"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <input type="hidden" name="form[formId]" value="3"/></form>
                                    <script type="text/javascript">RSFormPro.Ajax.URL = "\/index.php\/component\/rsform\/?task=ajaxValidate";</script>
                                    <script type="text/javascript">
                                        ajaxExtraValidationScript[3] = function (task, formId, data) {
                                            var formComponents = {};
                                            formComponents[25] = 'Name';
                                            formComponents[26] = 'tel';
                                            formComponents[27] = 'email';
                                            formComponents[28] = 'comment';
                                            RSFormPro.Ajax.displayValidationErrors(formComponents, task, formId, data);
                                        };
                                    </script>
                                </div>
                            </div>
                        </div>
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
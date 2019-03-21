<? include __DIR__ . '/../../head/index.php' ?>
<? include __DIR__ . '/../../header/index.php' ?>
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container">
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
                                                            alt="Светильник VS 001" height="450"
                                                            src="<?= $product['image'] ?>"
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
    <section id="sp-section-5">
        <div class="container">
            <div class="row">
                <div id="sp-user1" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div class="sp-module order">
                            <div class="sp-module-content">
                                <div class="rsformorder">
                                    <form method="post" id="userForm" class="formResponsive" action="podrobno.html">
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
                                                                <button type="button" name="form[submit]"
                                                                        id="submit" class="rsform-button">Заказать
                                                                </button>
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
<? include __DIR__ . '/../../footer/index.php' ?>
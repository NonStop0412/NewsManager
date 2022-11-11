@extends('layouts/app')

@section('title')
    <title>Posts</title>
@endsection

@section('content')
<form method="POST" name="managePostsForm" novalidate="novalidate" action={{route('manager.posts.save')}} id="managePostsForm">
    <div class="col-sm-9">
        <fieldset>
            <input type="hidden" name="id" value="">                    <input type="hidden" name="unix_key" value="1666172773">                    <input type="hidden" name="employee_id" value="30168">                    <input type="hidden" name="last_check" value="">                    <input type="hidden" name="task" value="0">

            <div class="form-group">
                <label for="input-firstname">Название <span class="text-danger">*</span></label>
                <input type="text" name="title" placeholder="Название" class="form-control" id="input-username" autocomplete="off" required="required" value="">                    </div>

            <div class="form-group">
                <label for="input-firstname">Путь <span class="text-danger">*</span></label>
                <input type="text" name="route" placeholder="Путь" class="form-control" id="input-username" autocomplete="off" readonly="readonly" required="required" value="" style="overflow-wrap: break-word;">                    </div>

            <div class="form-group anons">
                <label for="input-firstname">Краткое содержание (Анонс)  (30-160 символов)</label>
                <textarea name="anons" placeholder="Краткое содержание (Анонс) " class="form-control" maxlength="160"></textarea>                    </div>

            <label for="input-firstname" id="gallery-title" hidden="">Галерея</label>

            <div class="form-group" id="gallery">
            </div>


            <div class="form-group">
                <label for="input-middlename">Содержание <span class="text-danger">*</span></label>
                <br>
                <a class="btn btn-default btn-sm" style="margin-bottom: 5px" modal-trigger="mediaModalContentVideo"><i class="el el-video"></i>
                    Добавить видео                        </a>
                <a class="btn btn-default btn-sm" style="margin-bottom: 5px" modal-trigger="mediaModalContent"><i class="el el-picture"></i>
                    Добавить изображение                        </a>
                <a class="btn btn-default btn-sm" style="margin-bottom: 5px" modal-trigger="mediaModalContentGallery"><i class="far fa-images"></i>
                    Галерея                        </a>
                <div class="check-text-block">
                    <i class="fa fa-spinner fa-pulse fa fa-fw" style="display: none"></i>
                    <a href="/manage/posts/preview" target="_blank" data-click="preview" style="margin-right:10px;display: inline-block;">
                        <i class="fa fa-eye" aria-hidden="true"></i> Предпросмотр</a>
                    <span>
                    <span class="button-check"><a href="#" id="checkText"><i class="fa fa-check" aria-hidden="true"></i> Проверить текст</a></span>
                    <span class="loading-check-button"><img width="16" src="/assets/images/loading-ring.gif"> Загрузка...</span>
                </span>
                    <a href="#" id="watchResult" onclick="$('#check-text-content').modal('show');"><i class="fa fa-eye" aria-hidden="true"></i> Посмотреть результат</a>
                </div>
                <div style="clear:both"></div>
                <div id="mceu_17" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_17-body" class="mce-container-body mce-stack-layout"><div id="mceu_18" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_18-body" class="mce-container-body"><div id="mceu_19" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_19-body" class="mce-container-body mce-flow-layout"><div id="mceu_20" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_20" role="menuitem" aria-haspopup="true"><button id="mceu_20-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Файл</span> <i class="mce-caret"></i></button></div><div id="mceu_21" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_21" role="menuitem" aria-haspopup="true"><button id="mceu_21-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Изменить</span> <i class="mce-caret"></i></button></div><div id="mceu_22" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_22" role="menuitem" aria-haspopup="true"><button id="mceu_22-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Вид</span> <i class="mce-caret"></i></button></div><div id="mceu_23" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_23" role="menuitem" aria-haspopup="true"><button id="mceu_23-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Вставить</span> <i class="mce-caret"></i></button></div><div id="mceu_24" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_24" role="menuitem" aria-haspopup="true"><button id="mceu_24-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Формат</span> <i class="mce-caret"></i></button></div><div id="mceu_25" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_25" role="menuitem" aria-haspopup="true"><button id="mceu_25-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Таблица</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_26" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_26-body" class="mce-container-body mce-stack-layout"><div id="mceu_27" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_27-body" class="mce-container-body mce-flow-layout"><div id="mceu_28" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_28-body"></div></div><div id="mceu_29" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_29-body"><div id="mceu_0" class="mce-widget mce-btn mce-splitbtn mce-colorbutton mce-first mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Text color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-forecolor"></i><span id="mceu_0-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div></div></div><div id="mceu_30" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_30-body"><div id="mceu_1" class="mce-widget mce-btn mce-splitbtn mce-colorbutton mce-first mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Background color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-backcolor"></i><span id="mceu_1-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div></div></div><div id="mceu_31" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_31-body"><div id="mceu_2" class="mce-widget mce-btn mce-first mce-disabled" tabindex="-1" role="button" aria-label="Undo" aria-disabled="true"><button id="mceu_2-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div><div id="mceu_3" class="mce-widget mce-btn mce-last mce-disabled" tabindex="-1" role="button" aria-label="Redo" aria-disabled="true"><button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div></div></div><div id="mceu_32" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_32-body"><div id="mceu_4" class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_4" role="button" aria-haspopup="true"><button id="mceu_4-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Формат</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_33" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_33-body"><div id="mceu_5" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_5-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_6" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div></div></div><div id="mceu_34" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_34-body"><div id="mceu_7" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_7-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_8" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_8-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_9" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_9-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_10" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_10-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_35" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_35-body"><div id="mceu_11" class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first" role="button" aria-pressed="false" tabindex="-1" aria-label="Bullet list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_12" class="mce-widget mce-btn mce-splitbtn mce-menubtn" role="button" aria-pressed="false" tabindex="-1" aria-label="Numbered list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_13" class="mce-widget mce-btn" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_13-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_14" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_14-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_36" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_36-body"><div id="mceu_15" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit link"><button id="mceu_15-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div><div id="mceu_16" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit image"><button id="mceu_16-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-image"></i></button></div></div></div></div></div></div></div></div></div><div id="mceu_37" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="content_ifr" frameborder="0" allowtransparency="true" title="Текстовое поле. Нажмите ALT-F9 чтобы вызвать меню, ALT-F10 панель инструментов, ALT-0 для вызова помощи." style="width: 100%; height: 400px; display: block;"></iframe></div><div id="mceu_38" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_38-body" class="mce-container-body mce-flow-layout"><div id="mceu_39" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><div id="mceu_40" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_41" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tinymce.com/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank">tinymce</a></span></div></div></div></div><textarea name="content" id="content" placeholder="Содержание" class="form-control summernote" required="required" aria-hidden="true" style="display: none;"></textarea>                        <div id="countContent">Количество символов - <span>0</span></div>
                <div id="countContentWithoutSpace">Количество символов без пробелов - <span>0</span></div>
                <input type="hidden" name="countContent" value="0">
                <input type="hidden" name="countContentWithoutSpace" value="0">
            </div>

            <div class="row">
                <div class="col-md-6" style="padding-left:0;padding-right:10px;">
                    <div class="form-group">
                        <label for="input-firstname">Теги - Тема </label>

                        <div class="input-group">
                            <input class="form-control" type="text" value="" data-tag-theme-input="">
                            <span class="input-group-btn">
                    <button class="btn btn-default add-tags" type="button" data-tag-category="theme" data-tag-btn-add=""><i class="el el-plus-sign"></i></button>
                </span>
                        </div>

                        <div class="row" data-tag-theme-form="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left:10px;padding-right:0;">
                    <div class="form-group">
                        <label for="input-firstname">Теги - Персоны </label>

                        <div class="input-group">
                            <input class="form-control" type="text" value="" data-tag-persons-input="">
                            <span class="input-group-btn">
                    <button class="btn btn-default add-tags" data-tag-category="persons" type="button" data-tag-btn-add=""><i class="el el-plus-sign"></i></button>
                </span>
                        </div>

                        <div class="row" data-tag-persons-form="">
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6" style="padding-left:0;padding-right:10px;">
                    <div class="form-group">
                        <label for="input-firstname">Теги - Места </label>

                        <div class="input-group">
                            <input class="form-control" type="text" value="" data-tag-place-input="">
                            <span class="input-group-btn">
                    <button class="btn btn-default add-tags" data-tag-category="place" type="button" data-tag-btn-add=""><i class="el el-plus-sign"></i></button>
                </span>
                        </div>

                        <div class="row" data-tag-place-form="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left:10px;padding-right:0;">
                    <div class="form-group">
                        <label for="input-firstname">Теги - Обьекты </label>

                        <div class="input-group">
                            <input class="form-control" type="text" value="" data-tag-object-input="">
                            <span class="input-group-btn">
                    <button class="btn btn-default add-tags" data-tag-category="object" type="button" data-tag-btn-add=""><i class="el el-plus-sign"></i></button>
                </span>
                        </div>

                        <div class="row" data-tag-object-form="">
                        </div>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <label for="input-firstname">Замечание </label>
                <textarea name="remark" placeholder="Замечание" class="form-control" id="remark" maxlength="1000"></textarea>                    </div>
            <br><br><br>

        </fieldset>
    </div>

    <div class="col-md-3">
        <fieldset>
            <div class="form-group">
                <label for="input-middlename">Миниатюра</label>
                <input type="hidden" name="thumbnail" value="">                        <a class="thumbnail" modal-trigger="mediaModalThumbnail" style="cursor: pointer">
                    <img src="/assets/images/empty-thumbnail.gif" class="img-responsive" data-thumbnail="" style="max-width: 200px">
                </a>
            </div>

            <div class="form-group">
                <input type="hidden" name="video_preview" id="video_preview" value="">                        <div data-video-preview="">
                </div>
                <a class="btn btn-default" modal-trigger="mediaModalVideoPreview" style="width:100%;cursor: pointer">
                    <i class="fa fa-video-camera" aria-hidden="true"></i> Установить видеопревью                        </a>
            </div>

            <div class="form-group" hidden="">
                <label for="input-middlename">Статус <span class="text-danger">*</span></label>
                <select name="status" class="form-control" id="status_posts" required="required" disabled="disabled"><option value="">- Фильтр: Статус -</option>
                    <option value="pending">Ожидает согласования</option>
                    <option value="private">На доработку</option>
                    <option value="note">Черновик</option>
                    <option value="publish">Опубликовать</option>
                    <option value="unian_news">unian_news</option>
                    <option value="unian_business">unian_business</option>
                    <option value="planing">Плановое</option></select>                    </div>

            <a href="#" id="setPlaningStatus" onclick="return false;">Плановая?</a><br>
            <div class="form-group publish-at-box" hidden="" style="display: none;">
                <label for="input-firstname">Опубликовано <span class="text-danger">*</span></label>
                <div id="datetimepicker" class="input-append date input-group">
                    <input type="text" name="publish_at" placeholder="Опубликовано" class="form-control" data-format="yyyy-MM-dd hh:mm" value="">                            <div class="input-group-addon add-on">
                        <i class="el el-calendar"></i>
                    </div>
                </div>
            </div>

            <label>Тип <span class="text-danger">*</span></label>
            <div class="form-group">
                <select name="type" class="form-control"><option value="post">Post</option>
                    <option value="gallery">Галерея</option>
                    <option value="quote">Quote</option></select>                    </div>

            <label>Медиа тип</label>
            <div class="form-group">
                <select name="media-type" class="form-control"><option value="">Выберите тип</option>
                    <option value="photo">Фото</option>
                    <option value="video">Видео</option></select>                    </div>

            <div class="form-group" hidden="">
                <label>Язык <span class="text-danger">*</span></label>
                <select name="locale" class="form-control" required="required" autocomplete="off" disabled="disabled"><option value="ru_RU">Русский</option>
                    <option value="uk_UA">Українська</option>
                    <option value="en_US">English</option></select>                    </div>
            <label>Внешняя категория <span class="text-danger">*</span></label>

            <div class="form-group">
                <select name="categories-ext" class="form-control multiselect" id="categories-ext" style="display: none;">
                    <option>Ничего не выбрано</option>
                    <option value="1">Политика</option>
                    <option value="31">Новости Украины</option>
                    <option value="39">Красота</option>
                    <option value="38">Lifestyle</option>
                    <option value="36">Мнения</option>
                    <option value="35">Шоу-бизнес</option>
                    <option value="34">Путешествия</option>
                    <option value="33">Здоровье</option>
                    <option value="32">Технологии</option>
                    <option value="25">Еженедельные обзоры</option>
                    <option value="2">Экономика</option>
                    <option value="22">УНИАН</option>
                    <option value="9">Видео</option>
                    <option value="7">Наука</option>
                    <option value="6">Новости мира</option>
                    <option value="5">Спорт</option>
                    <option value="4">Происшествия</option>
                    <option value="3">Общество</option>
                    <option value="40">Мода</option>
                    <optgroup label="Медиа">
                        <option value="8">Фото</option>
                        <option value="29">Музыка</option>
                        <option value="30">Карикатура</option>
                    </optgroup>
                </select><div class="btn-group" style="width: 100%;"><button type="button" class="multiselect dropdown-toggle btn btn-default btn-block" data-toggle="dropdown" title="Ничего не выбрано" style="width: 100%; overflow: hidden; text-overflow: ellipsis;"><span class="multiselect-selected-text">Ничего не выбрано</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu" style="max-height: 400px; overflow: hidden auto;"><li class="multiselect-item filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="el el-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="el el-remove"></i></button></span></div></li><li class="active"><a tabindex="0"><label class="radio"><input type="radio" value="Ничего не выбрано"> Ничего не выбрано</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="1"> Политика</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="31"> Новости Украины</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="39"> Красота</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="38"> Lifestyle</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="36"> Мнения</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="35"> Шоу-бизнес</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="34"> Путешествия</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="33"> Здоровье</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="32"> Технологии</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="25"> Еженедельные обзоры</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="2"> Экономика</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="22"> УНИАН</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="9"> Видео</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="7"> Наука</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="6"> Новости мира</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="5"> Спорт</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="4"> Происшествия</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="3"> Общество</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="40"> Мода</label></a></li><li class="multiselect-item multiselect-group"><label>Медиа</label></li><li><a tabindex="0"><label class="radio"><input type="radio" value="8"> Фото</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="29"> Музыка</label></a></li><li><a tabindex="0"><label class="radio"><input type="radio" value="30"> Карикатура</label></a></li></ul></div>
            </div>

            <div>
                <label>Внутренняя категория</label>
                <div class="form-group">
                    <select name="categories-int[]" class="form-control multiselect" multiple="multiple" id="multiselect" style="display: none;"><option value="10">Слайдер</option>
                        <option value="11">Рекомендуем</option>
                        <option value="14">Главные новости</option>
                        <option value="15">ТОП синглы</option>
                        <option value="16">Последние обзоры</option>
                        <option value="17">Цитата</option>
                        <option value="18">Выбор редактора</option>
                        <option value="19">Еженедельные фото</option>
                        <option value="23">На правах рекламы</option>
                        <option value="24">Пресс-релиз</option>
                        <option value="37">Новости дня</option></select><div class="btn-group" style="width: 100%;"><button type="button" class="multiselect dropdown-toggle btn btn-default btn-block" data-toggle="dropdown" title="Ничего не выбрано" style="width: 100%; overflow: hidden; text-overflow: ellipsis;"><span class="multiselect-selected-text">Ничего не выбрано</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu" style="max-height: 400px; overflow: hidden auto;"><li class="multiselect-item filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="el el-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="el el-remove"></i></button></span></div></li><li class="multiselect-item multiselect-all"><a tabindex="0" class="multiselect-all"><label class="checkbox"><input type="checkbox" value="multiselect-all">  Выбрать все</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="10"> Слайдер</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="11"> Рекомендуем</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="14"> Главные новости</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="15"> ТОП синглы</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="16"> Последние обзоры</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="17"> Цитата</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="18"> Выбор редактора</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="19"> Еженедельные фото</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="23"> На правах рекламы</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="24"> Пресс-релиз</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="37"> Новости дня</label></a></li></ul></div>                            </div>
            </div>

            <div class="form-group opinion-author" style="display: none">
                <label>Автор <span class="text-danger">*</span></label>
                <select name="opinionAuthor" class="form-control" id="opinionAuthor"><option value="">Выберите автора</option></select>                        </div>

            <div class="funkyradio">
                <div class="funkyradio-success">
                    <input type="hidden" name="show_author" value="0"><input type="checkbox" name="show_author" id="show_author" value="1">                                <label for="show_author">Авторская новость</label>
                </div>

                <div class="funkyradio-success">
                    <input type="hidden" name="is_fb" value="0"><input type="checkbox" name="is_fb" id="is_fb" checked="checked" onclick="" value="1">                                    <label for="is_fb">Опубликовать в Facebook?</label>
                </div>

                <div class="funkyradio-success">
                    <input type="hidden" name="is_tw" value="0"><input type="checkbox" name="is_tw" id="is_tw" checked="checked" onclick="" value="1">                                    <label for="is_tw">Опубликовать в Twitter?</label>
                </div>

                <div class="funkyradio-success">
                    <input type="hidden" name="is_vk" value="0"><input type="checkbox" name="is_vk" id="is_vk" checked="checked" onclick="" value="1">                                    <label for="is_vk">Опубликовать в Vk?</label>
                </div>

            </div>


            <div class="buttonsSave">
                <div class="form-group">
                    <button type="submit" onclick="$('[name=statusFlag]').val('note');" class="btn btn-primary btn-sm btn-block"><i class="el el-align-justify"></i> Сохранить черновик</button>
                </div>

                <div class="form-group planing_button" style="display:none">
                    <button type="submit" onclick="$('[name=statusFlag]').val('planing');" class="btn btn-info btn-sm btn-block"><i class="el el-calendar"></i> Сохранить как плановую</button>
                </div>
                <div class="form-group">
                    <button type="submit" onclick="$('[name=statusFlag]').val('pending');" class="btn btn-info btn-sm btn-block"><i class="el el-time"></i> На проверку</button>
                </div>

                <div class="form-group">
                    <button type="submit" onclick="$('[name=statusFlag]').val('private');" class="btn btn-danger btn-sm btn-block"><i class="el el-return-key"></i> Вернуть на редактирование</button>
                </div>

                <div class="form-group">
                    <button type="submit" onclick="$('[name=statusFlag]').val('publish');" data-name="publish" class="btn btn-success btn-sm btn-block"><i class="el el-ok"></i> Опубликовать</button>
                </div>
                <input type="hidden" name="statusFlag" value="">
            </div>
        </fieldset>

    </div>
</form>
@endsection

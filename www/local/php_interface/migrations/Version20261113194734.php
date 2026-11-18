<?php

namespace Sprint\Migration;


class Version20261113194734 extends Version
{
    protected $author = "admin";

    protected $description = "ИБ Каталог (clothes)";

    protected $moduleVersion = "5.16.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType(array (
            'ID' => 'catalog',
            'SECTIONS' => 'Y',
            'EDIT_FILE_BEFORE' => NULL,
            'EDIT_FILE_AFTER' => NULL,
            'IN_RSS' => 'N',
            'SORT' => '100',
            'LANG' =>
                array (
                    'ru' =>
                        array (
                            'NAME' => 'Каталоги',
                            'SECTION_NAME' => 'Разделы',
                            'ELEMENT_NAME' => 'Товары',
                        ),
                    'en' =>
                        array (
                            'NAME' => 'Catalog',
                            'SECTION_NAME' => 'Sections',
                            'ELEMENT_NAME' => 'Products',
                        ),
                ),
        ));
        $iblockId = $helper->Iblock()->saveIblock(array (
            'IBLOCK_TYPE_ID' => 'catalog',
            'LID' =>
                array (
                    0 => 's1',
                ),
            'CODE' => 'clothes',
            'API_CODE' => 'clothes',
            'REST_ON' => 'Y',
            'NAME' => 'Одежда',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/catalog/',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/',
            'SECTION_PAGE_URL' => '#SITE_DIR#/catalog/#SECTION_CODE#/',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => '36',
            'DESCRIPTION' => 'Одежда нашей основной фабрики в Санкт-Петербурге.',
            'DESCRIPTION_TYPE' => 'html',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => NULL,
            'RSS_FILE_DAYS' => NULL,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => 'clothes_s1',
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => 'S',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'Y',
            'PROPERTY_INDEX' => 'Y',
            'VERSION' => '1',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => NULL,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Товары',
            'ELEMENT_NAME' => 'Товар',
            'FULLTEXT_INDEX' => 'N',
            'EXTERNAL_ID' => 'clothes_s1',
            'LANG_DIR' => '/',
            'IPROPERTY_TEMPLATES' =>
                array (
                    'ELEMENT_META_TITLE' => 'Каталог {=this.Name} от магазина Одежда+',
                    'ELEMENT_META_KEYWORDS' => '{=this.Name}, купить {=this.Name}, приобрести {=this.Name}, {=this.Name} в различных цветах, {=this.Name} от дистрибьютора',
                    'ELEMENT_META_DESCRIPTION' => 'В магазине Одежда+ собран огромный каталог, где не последняя роль отведена разделу {=this.Name}, представленный официальным дистрибьютором в России',
                    'ELEMENT_DETAIL_PICTURE_FILE_TITLE' => 'картинка {=this.Name} магазин Одежда+ являющийся официальным дистрибьютором в России ',
                    'ELEMENT_DETAIL_PICTURE_FILE_NAME' => '{=lower this.Name}/lt-',
                    'ELEMENT_DETAIL_PICTURE_FILE_ALT' => 'картинка {=this.Name} от магазина Одежда+',
                    'ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => 'картинка {=this.Name} магазин Одежда+ являющийся официальным дистрибьютором в России ',
                    'SECTION_META_DESCRIPTION' => 'В магазине Одежда+ собран огромный каталог, где не последняя роль отведена разделу {=this.Name}, представленный официальным дистрибьютором в России',
                    'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => 'картинка {=this.Name} от магазина Одежда+',
                    'SECTION_META_KEYWORDS' => '{=this.Name}, купить {=this.Name}, приобрести {=this.Name}, {=this.Name} в различных цветах, {=this.Name} от дистрибьютора',
                    'SECTION_META_TITLE' => 'Каталог {=this.Name} от магазина Одежда+',
                    'ELEMENT_PREVIEW_PICTURE_FILE_NAME' => '{=lower this.Name}/lt-',
                ),
            'ELEMENT_ADD' => 'Добавить товар',
            'ELEMENT_EDIT' => 'Изменить товар',
            'ELEMENT_DELETE' => 'Удалить товар',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ));
        $helper->Iblock()->saveIblockFields($iblockId, array (
            'IBLOCK_SECTION' =>
                array (
                    'NAME' => 'Привязка к разделам',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' =>
                        array (
                            'KEEP_IBLOCK_SECTION_ID' => 'N',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE' =>
                array (
                    'NAME' => 'Активность',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'Y',
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE_FROM' =>
                array (
                    'NAME' => 'Начало активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'ACTIVE_TO' =>
                array (
                    'NAME' => 'Окончание активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SORT' =>
                array (
                    'NAME' => 'Сортировка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '0',
                    'VISIBLE' => 'Y',
                ),
            'NAME' =>
                array (
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_PICTURE' =>
                array (
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array (
                            'FROM_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'DELETE_WITH_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_TEXT_TYPE' =>
                array (
                    'NAME' => 'Тип описания для анонса',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'PREVIEW_TEXT' =>
                array (
                    'NAME' => 'Описание для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_PICTURE' =>
                array (
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array (
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_TEXT_TYPE' =>
                array (
                    'NAME' => 'Тип детального описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'DETAIL_TEXT' =>
                array (
                    'NAME' => 'Детальное описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'XML_ID' =>
                array (
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'CODE' =>
                array (
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' =>
                        array (
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '_',
                            'TRANS_OTHER' => '_',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'Y',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'TAGS' =>
                array (
                    'NAME' => 'Теги',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_NAME' =>
                array (
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_PICTURE' =>
                array (
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array (
                            'FROM_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'DELETE_WITH_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DESCRIPTION_TYPE' =>
                array (
                    'NAME' => 'Тип описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DESCRIPTION' =>
                array (
                    'NAME' => 'Описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_DETAIL_PICTURE' =>
                array (
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        array (
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => '',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'SECTION_XML_ID' =>
                array (
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                    'VISIBLE' => 'Y',
                ),
            'SECTION_CODE' =>
                array (
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' =>
                        array (
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '_',
                            'TRANS_OTHER' => '_',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'Y',
                        ),
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_ADD' =>
                array (
                    'NAME' => 'LOG_SECTION_ADD',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_EDIT' =>
                array (
                    'NAME' => 'LOG_SECTION_EDIT',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
            'LOG_SECTION_DELETE' =>
                array (
                    'NAME' => 'LOG_SECTION_DELETE',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_ADD' =>
                array (
                    'NAME' => 'LOG_ELEMENT_ADD',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_EDIT' =>
                array (
                    'NAME' => 'LOG_ELEMENT_EDIT',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
            'LOG_ELEMENT_DELETE' =>
                array (
                    'NAME' => 'LOG_ELEMENT_DELETE',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => NULL,
                    'VISIBLE' => 'Y',
                ),
        ));
        $helper->Iblock()->saveGroupPermissions($iblockId, array (
            'administrators' => 'X',
            'everyone' => 'R',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Заголовок окна браузера',
            'ACTIVE' => 'Y',
            'SORT' => '110',
            'CODE' => 'TITLE',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '50',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '331',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Ключевые слова',
            'ACTIVE' => 'Y',
            'SORT' => '120',
            'CODE' => 'KEYWORDS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '50',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '335',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Мета-описание',
            'ACTIVE' => 'Y',
            'SORT' => '130',
            'CODE' => 'META_DESCRIPTION',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '3',
            'COL_COUNT' => '38',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '337',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Новинка',
            'ACTIVE' => 'Y',
            'SORT' => '210',
            'CODE' => 'NEWPRODUCT',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'C',
            'MULTIPLE' => 'N',
            'XML_ID' => 'af49d0e309af4fac506a8a228000efc5',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'Y',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'VALUES' =>
                array (
                    0 =>
                        array (
                            'VALUE' => 'да',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'Y',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Лидер продаж',
            'ACTIVE' => 'Y',
            'SORT' => '220',
            'CODE' => 'SALELEADER',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'C',
            'MULTIPLE' => 'N',
            'XML_ID' => '103',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'Y',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'VALUES' =>
                array (
                    0 =>
                        array (
                            'VALUE' => 'да',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'YYY',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Спецпредложение',
            'ACTIVE' => 'Y',
            'SORT' => '230',
            'CODE' => 'SPECIALOFFER',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'C',
            'MULTIPLE' => 'N',
            'XML_ID' => '5',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'Y',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'VALUES' =>
                array (
                    0 =>
                        array (
                            'VALUE' => 'да',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'YES',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Артикул',
            'ACTIVE' => 'Y',
            'SORT' => '310',
            'CODE' => 'ARTNUMBER',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '10',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'FEATURES' =>
                array (
                    0 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                    1 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Производитель',
            'ACTIVE' => 'Y',
            'SORT' => '320',
            'CODE' => 'MANUFACTURER',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '12',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'FEATURES' =>
                array (
                    0 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                    1 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'Y',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Материал',
            'ACTIVE' => 'Y',
            'SORT' => '330',
            'CODE' => 'MATERIAL',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => '11',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '1',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'FEATURES' =>
                array (
                    0 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                    1 =>
                        array (
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ),
                ),
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'Y',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Цвет',
            'ACTIVE' => 'Y',
            'SORT' => '340',
            'CODE' => 'COLOR',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => '291',
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '3',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'Y',
            'DISPLAY_TYPE' => 'F',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array (
            'NAME' => 'Картинка',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'MORE_PHOTO',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'F',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => 'MORE_PHOTO',
            'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'Y',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
            'SECTION_PROPERTY' => 'Y',
            'SMART_FILTER' => 'N',
            'DISPLAY_TYPE' => '',
            'DISPLAY_EXPANDED' => 'N',
            'FILTER_HINT' => '',
        ));
        $helper->UserOptions()->saveSectionGrid($iblockId, array (
            'views' =>
                array (
                    'default' =>
                        array (
                            'columns' =>
                                array (
                                    0 => '',
                                ),
                            'columns_sizes' =>
                                array (
                                    'expand' => 1,
                                    'columns' =>
                                        array (
                                        ),
                                    'resized' =>
                                        array (
                                        ),
                                ),
                            'sticked_columns' =>
                                array (
                                ),
                            'custom_names' =>
                                array (
                                ),
                        ),
                ),
            'filters' =>
                array (
                ),
            'current_view' => 'default',
        ));

    }
}

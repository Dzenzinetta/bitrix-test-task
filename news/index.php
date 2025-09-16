<?php

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php';
$APPLICATION->SetTitle('Новости');

$APPLICATION->IncludeComponent(
    'bitrix:news',
    'mc_news',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 1,
        'SET_TITLE' => 'Y',

        // ЧПУ
        'SEF_MODE' => 'Y',
        'SEF_FOLDER' => '/news/',
        'SEF_URL_TEMPLATES' => [
            'news' => '',              // список
            'section' => '',              // без разделов
            'detail' => '#ELEMENT_CODE#/', // детальная по коду
        ],

        // Список
        'NEWS_COUNT' => 10,
        'LIST_FIELD_CODE' => ['ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'],
        'LIST_PROPERTY_CODE' => ['SOURCE_LINK'],

        // Детальная
        'DETAIL_FIELD_CODE' => ['DETAIL_TEXT', 'DETAIL_PICTURE', 'ACTIVE_FROM'],
        'DETAIL_PROPERTY_CODE' => ['SOURCE_LINK'],

        // Остальное
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'SET_STATUS_404' => 'Y',

        // для комплексного компонента
        'SORT_BY1' => 'ID',
        'SORT_ORDER1' => 'DESC',

    ]
);

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php';

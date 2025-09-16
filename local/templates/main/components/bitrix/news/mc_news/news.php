<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit();
} $this->setFrameMode(true); ?>
<?php

$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'list_news',            // имя подшаблона списка
    [
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'NEWS_COUNT' => $arParams['NEWS_COUNT'] ?? 9,
        'FIELD_CODE' => $arParams['LIST_FIELD_CODE'] ?? ['ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'],
        'PROPERTY_CODE' => $arParams['LIST_PROPERTY_CODE'] ?? ['SOURCE_LINK'],
        'CHECK_DATES' => $arParams['CHECK_DATES'] ?? 'N',
        'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['detail'],
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'SORT_BY1' => 'ID',
        'SORT_ORDER1' => 'ASC',
    ],
    $component
);

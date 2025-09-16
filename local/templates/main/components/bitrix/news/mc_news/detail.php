<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit();
} $this->setFrameMode(true); ?>
<?php
$APPLICATION->IncludeComponent(
    'bitrix:news.detail',
    'detail_news',
    [
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
        'FIELD_CODE' => $arParams['DETAIL_FIELD_CODE'] ?? ['DETAIL_TEXT', 'DETAIL_PICTURE', 'ACTIVE_FROM'],
        'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'] ?? ['SOURCE_LINK'],
        'CHECK_DATES' => $arParams['CHECK_DATES'] ?? 'N',
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
    ],
    $component
);

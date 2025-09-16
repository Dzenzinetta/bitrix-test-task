<?php

if (file_exists($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/vendor/autoload.php';
}

@set_time_limit(300);
@ini_set('memory_limit', '512M');
@ini_set('default_socket_timeout', '20');

use Bitrix\Main\Loader;
use Testtask\ArticleService;

function Agent_ImportNewsFromLocalService(): string
{
    if (! Loader::includeModule('iblock')) {
        return __FUNCTION__.'();';
    }

    // Настройки для транлитера из доков
    $codeParams = [
        'max_len' => '100', // обрезает символьный код до 100 символов
        'change_case' => 'L', // буквы преобразуются к нижнему регистру
        'replace_space' => '_', // меняем пробелы на нижнее подчеркивание
        'replace_other' => '_', // меняем левые символы на нижнее подчеркивание
        'delete_repeat_replace' => 'true', // удаляем повторяющиеся нижние подчеркивания
        'use_google' => 'false', // отключаем использование google
    ];

    $service = new ArticleService;
    $articles = $service->getArticlesAboutMcDonalds();

    foreach ($articles as $article) {
        $fields = [
            'IBLOCK_ID' => 1,
            'NAME' => $article->title,
            'IBLOCK_SECTION_ID' => false,
            'ACTIVE' => 'Y',
            'PREVIEW_TEXT' => $article->previewText,
            'DETAIL_TEXT' => $article->detailText,
            'DETAIL_TEXT_TYPE' => 'text',
            'PROPERTY_VALUES' => [
                'SOURCE_LINK' => $article->sourceLink,
            ],
            'CODE' => CUtil::translit($article->title, 'ru', $codeParams),
        ];

        usleep(150000);
        if ($article->imageUrl) {
            $retries = 2;
            for ($i = 0; $i <= $retries; $i++) {
                $file = \CFile::MakeFileArray($article->imageUrl);
                if (is_array($file) && empty($file['error'])) {
                    $fields['DETAIL_PICTURE'] = $file;
                    break;
                }
            }
        }
        usleep(200000);

        $el = new \CIBlockElement;
        if ($PRODUCT_ID = $el->Add($fields)) {
            echo 'New ID: '.$PRODUCT_ID;
        } else {
            echo 'Error: '.$el->LAST_ERROR;
        }
    }

    return __FUNCTION__.'();';
}

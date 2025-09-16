<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); ?>
<?php $APPLICATION->SetTitle("Главная"); ?>
<?$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "services",
  [
    "IBLOCK_TYPE"    => "content",
    "IBLOCK_ID"      => 2,
    "NEWS_COUNT"     => 12,
    "SORT_BY1"       => "SORT",
    "SORT_ORDER1"    => "ASC",
    "FIELD_CODE"     => ["NAME","PREVIEW_TEXT","PREVIEW_PICTURE"],
    "SET_TITLE"      => "N",
    "INCLUDE_SUBSECTIONS" => "N",
    "CACHE_TYPE"     => "A",
    "CACHE_TIME"     => 3600
  ],
  false
);?>

<?$APPLICATION->IncludeFile(
    SITE_DIR."include/about.php",
    [],
    ["MODE" => "html", "NAME" => "Блок 'О нас'"]
);?>

<?$APPLICATION->IncludeComponent(
      "bitrix:news.list",
      "team",
      [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID"   => 3,
        "NEWS_COUNT"  => 3,
        "SORT_BY1"       => "ID",
        "SORT_ORDER1"    => "ASC",
        "FIELD_CODE"  => ["NAME","PREVIEW_PICTURE"],
        "PROPERTY_CODE"=> ["POSITION","GIT","INSTAGRAM"],
        "SET_TITLE"   => "N",
        "INCLUDE_SUBSECTIONS"=>"N",
        "CACHE_TYPE"  => "A",
        "CACHE_TIME"  => 3600
      ],
      false
    );?>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>
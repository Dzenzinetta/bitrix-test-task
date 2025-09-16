<?php

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/vendor/autoload.php';
echo "\n".Agent_ImportNewsFromLocalService();

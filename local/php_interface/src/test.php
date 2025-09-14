<?php
require_once('../vendor/autoload.php');
/* namespace Kustov\Testtask; */

$parser = new Kustov\Testtask\LentaParser();
$parser->getNewsByKeyword();


<?php declare(strict_types=1);

/**
 * Загрузчик для юнит-тестов: автозагрузка классов ядра и модуля без пролога и без базы.
 * Подключается из phpunit.xml.
 */
use Bitrix\Main\Loader;

require dirname(__DIR__) . '/vendor/autoload.php';

$_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__) . '/www';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/lib/loader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/autoload.php';

Loader::registerNamespace('Bxmax\Shop', $_SERVER['DOCUMENT_ROOT'] . '/local/modules/bxmax.shop/lib');
Loader::registerNamespace('Tests', __DIR__);
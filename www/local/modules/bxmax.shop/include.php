<?php declare(strict_types=1);

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

try {
    if (!Loader::includeModule('iblock')) {
        throw new LoaderException('Модуль iblock не установлен');
    }
} catch (LoaderException $e) {
    echo $e->getMessage();
}
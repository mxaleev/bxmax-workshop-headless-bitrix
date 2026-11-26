<?php declare(strict_types=1);

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

try {
    if (!Loader::includeModule('iblock')) {
        throw new LoaderException('Модуль iblock не установлен');
    }

    if (!Loader::includeModule('catalog')) {
        throw new LoaderException('Модуль catalog не установлен');
    }

    if (!Loader::includeModule('sale')) {
        throw new LoaderException('Модуль sale не установлен');
    }

    if (!Loader::includeModule('currency')) {
        throw new LoaderException('Модуль currency не установлен');
    }
} catch (LoaderException $e) {
    echo $e->getMessage();
}
<?php declare(strict_types=1);

use Bxmax\Shop\Internals\Repository\Mapper\ProductMapper;

test('переводит строку инфоблока в товар контракта', function () {
    $product = ProductMapper::convertFromRow([
        'ID' => '9',
        'NAME' => 'Штаны "Цветочная поляна"',
        'CODE' => 'pants-flower-glade',
        'PRICE_AMOUNT' => 2199.0,
        'PRICE_CURRENCY' => 'RUB',
    ]);

    expect($product)->toBe([
        'id' => 9,
        'name' => 'Штаны "Цветочная поляна"',
        'code' => 'pants-flower-glade',
        'price' => ['amount' => '2199.00', 'currency' => 'RUB'],
    ]);
});

test('товар без цены приходит с price: null', function () {
    $product = ProductMapper::convertFromRow([
        'ID' => '1',
        'NAME' => 'Худи',
        'CODE' => 'hoodie',
        'PRICE_AMOUNT' => null,
        'PRICE_CURRENCY' => null,
    ]);

    expect($product['price'])->toBeNull();
});

test('сумма — строка с двумя знаками после точки', function (float|string $amount, string $expected) {
    $product = ProductMapper::convertFromRow([
        'ID' => '1',
        'NAME' => 'Худи',
        'CODE' => 'hoodie',
        'PRICE_AMOUNT' => $amount,
        'PRICE_CURRENCY' => 'RUB',
    ]);

    expect($product['price']['amount'])->toBe($expected);
})->with([
    'целая' => [1990.0, '1990.00'],
    'с копейками' => [1199.5, '1199.50'],
    'строка из базы' => ['899.00000000', '899.00'],
]);

<?php declare(strict_types=1);

use Bxmax\Shop\Internals\Repository\Mapper\CategoryMapper;

test('переводит строку инфоблока в категорию контракта', function () {
    $category = CategoryMapper::convertFromRow([
        'ID' => '1',
        'NAME' => 'Обувь',
        'CODE' => 'shoes',
        'DEPTH_LEVEL' => '1',
        'LEFT_MARGIN' => '1',
        'RIGHT_MARGIN' => '12',
        'BACKGROUND_IMAGE' => null,
    ]);

    expect($category)->toBe([
        "id" => 1,
        "name" => "Обувь",
        "code" => "shoes",
        "depthLevel" => 1,
        "leftMargin" => 1,
        "rightMargin" => 12,
        "backgroundImage" => null
    ]);
});

test('категория без BACKGROUND_IMAGE приходит как null', function () {
    $category = CategoryMapper::convertFromRow([
        'ID' => '1',
        'NAME' => 'Обувь',
        'CODE' => 'shoes',
        'DEPTH_LEVEL' => '1',
        'LEFT_MARGIN' => '1',
        'RIGHT_MARGIN' => '12',
        'BACKGROUND_IMAGE' => null,
    ]);

    expect($category['backgroundImage'])->toBeNull();
});

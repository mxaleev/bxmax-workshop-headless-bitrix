<?php declare(strict_types=1);

use Bxmax\Shop\Internals\Repository\Mapper\FileMapper;

test('переводит строку инфоблока в файл контракта', function () {
    $file = FileMapper::convertFromRow([
        'ID' => '947',
        'SUBDIR' => 'uf/16e',
        'FILE_NAME' => 'jlv5j7w47f3p9vnqu2f1n4vvengvuciu.jpg',
        'ORIGINAL_NAME' => 'images.jpg',
        'CONTENT_TYPE' => 'image/jpeg',
        'FILE_SIZE' => '11834',
        'WIDTH' => '318',
        'HEIGHT' => '159',
    ]);

    expect($file)->toBe([
        "id" => 947,
        "src" => "/upload/uf/16e/jlv5j7w47f3p9vnqu2f1n4vvengvuciu.jpg",
        "originalName" => "images.jpg",
        "contentType" => "image/jpeg",
        "size" => 11834,
        "width" => 318,
        "height" => 159
    ]);
});

test('если ID отсутствует ответ null', function () {
    $file = FileMapper::convertFromRow([
        'ID' => null,
        'SUBDIR' => 'uf/16e',
        'FILE_NAME' => 'jlv5j7w47f3p9vnqu2f1n4vvengvuciu.jpg',
        'ORIGINAL_NAME' => 'images.jpg',
        'CONTENT_TYPE' => 'image/jpeg',
        'FILE_SIZE' => '11834',
        'WIDTH' => '318',
        'HEIGHT' => '159',
    ]);

    expect($file)->toBeNull();
});

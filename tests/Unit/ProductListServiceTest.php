<?php declare(strict_types=1);

use Bxmax\Shop\Public\Service\ProductListService;
use Tests\Fake\InMemoryProductRepository;

function catalogOf(int $count): InMemoryProductRepository
{
    return new InMemoryProductRepository(array_map(product(...), range(1, $count)));
}

test('отдает нужную страницу и общее число товаров', function () {
    $data = new ProductListService(catalogOf(5))->getPage(2, 2)->getData();

    expect(array_column($data['items'], 'id'))->toBe([3,4])
        ->and($data['meta'])->toBe(['page' => 2, 'pageSize' => 2, 'total' => 5]);
});

test('не отдает больше 50 товаров за раз', function () {
    $data = new ProductListService(catalogOf(100))->getPage(1, 999)->getData();

    expect($data['items'])
        ->toHaveCount(50)
        ->and($data['meta']['pageSize'])->toBe(50);
});

test('страница 0 и ниже становится первой', function (int $page) {
    $data = new ProductListService(catalogOf(3))->getPage($page, 20)->getData();

    expect($data['meta']['page'])->toBe(1)
        ->and($data['items'])->toHaveCount(3);
})->with([0,-5]);

<?php declare(strict_types=1);

use Bxmax\Shop\Public\Service\ProductViewService;
use Tests\Fake\InMemoryProductRepository;

function catalogWith(array $ids): InMemoryProductRepository
{
    return new InMemoryProductRepository(array_map(product(...), $ids));
}

test('отдаёт нужную карточку товара', function () {
    $result = new ProductViewService(catalogWith([1,2]))->getById(2);

    expect($result->isSuccess())->toBeTrue()
        ->and($result->getData()['id'])
        ->toBe(2);
});

test('на неизвестный id отвечает кодом PRODUCT_NOT_FOUND', function () {
    $result = new ProductViewService(catalogWith([1,5]))->getById(2);

    expect($result->isSuccess())->toBeFalse()
        ->and($result->getErrors()[0]->getCode())->toBe('PRODUCT_NOT_FOUND');
});
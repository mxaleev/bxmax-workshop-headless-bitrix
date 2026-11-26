<?php declare(strict_types=1);

use Bxmax\Shop\Public\Service\CategoryService;
use Tests\Fake\InMemoryCategoryRepository;

function catalogCategoryWith(array $ids): InMemoryCategoryRepository
{
    return new InMemoryCategoryRepository(array_map(category(...), $ids));
}

test('в списке существуют переданные элементы', function () {
    $result = new CategoryService(catalogCategoryWith([1,2]))->getById(2);

    expect($result->isSuccess())->toBeTrue()
        ->and($result->getData()['id'])
        ->toBe(2);
});

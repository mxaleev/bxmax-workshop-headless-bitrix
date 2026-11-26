<?php declare(strict_types=1);

/**
 * Общие помощники тестов. Загрузчик ядра — в tests/bootstrap.php.
 */

/**
 * Товар в форме, которую репозиторий отдаёт сервису.
 *
 * @return array{id: int, name: string, code: string, price: ?array{amount: string, currency: string}}
 */
function product(int $id, ?string $amount = '1000.00'): array
{
    return [
        'id' => $id,
        'name' => "Товар {$id}",
        'code' => "product-{$id}",
        'price' => $amount === null ? null : ['amount' => $amount, 'currency' => 'RUB'],
    ];
}

/**
 * @param int $id
 * @return array
 */
function category(int $id): array
{
    return [
        'id' => $id,
        'name' => "Категория {$id}",
        'code' => "category-{$id}",
        'depth_level' => $id,
        'left_margin' => $id,
        'right_margin' => $id,
    ];
}
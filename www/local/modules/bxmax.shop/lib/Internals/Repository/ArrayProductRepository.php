<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final class ArrayProductRepository implements ProductRepositoryInterface
{
    private const PRODUCTS = [
        [
            'id' => 1,
            'name' => 'Товар 1',
            'price' => ['amount' => 100, 'currency' => 'RUR']
        ],
        [
            'id' => 2,
            'name' => 'Товар 2',
            'price' => ['amount' => 200, 'currency' => 'RUR']
        ],
        [
            'id' => 3,
            'name' => 'Товар 3',
            'price' => null
        ]
    ];

    /**
     * @param int $limit
     * @param int $offset
     * @return array|array[]
     */
    public function findActive(int $limit, int $offset): array
    {
        return array_slice(self::PRODUCTS, $offset, $limit);
    }

    /**
     * @return int
     */
    public function countActive(): int
    {
        return count(self::PRODUCTS);
    }
}
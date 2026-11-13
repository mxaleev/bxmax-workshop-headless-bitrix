<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final class IblockProductRepository implements ProductRepositoryInterface
{
    /**
     * @param int $limit
     * @param int $offset
     * @return array|array[]
     */
    public function findActive(int $limit, int $offset): array
    {
        return [];
    }

    /**
     * @return int
     */
    public function countActive(): int
    {
        return 0;
    }
}
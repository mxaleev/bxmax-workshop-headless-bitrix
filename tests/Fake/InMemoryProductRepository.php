<?php declare(strict_types=1);

namespace Tests\Fake;

use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final readonly class InMemoryProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private array $products,
    ) {

    }

    /**
     * @param int $limit
     * @param int $offset
     * @return array|array[]
     */
    public function findActive(int $limit, int $offset): array
    {
        return array_slice($this->products, $offset, $limit);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findActiveById(int $id): ?array
    {
        $products = $this->products;
        $key = array_search($id, array_column($products, 'id'), true);
        return ($key !== false) ? $products[$key] : null;
    }

    /**
     * @return int
     */
    public function countActive(): int
    {
        return count($this->products);
    }
}
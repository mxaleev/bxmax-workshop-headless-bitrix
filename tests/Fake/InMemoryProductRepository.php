<?php declare(strict_types=1);

namespace Tests\Fake;

use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final readonly class InMemoryProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private array $products,
    ) {

    }

    public function findActive(int $limit, int $offset): array
    {
        return array_slice($this->products, $offset, $limit);
    }

    public function countActive(): int
    {
        return count($this->products);
    }
}
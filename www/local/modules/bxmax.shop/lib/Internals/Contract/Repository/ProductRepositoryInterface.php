<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Contract\Repository;

interface ProductRepositoryInterface
{
    /**
     * @param int $limit
     * @param int $offset
     * @return list<array{
     *      id: int,
     *      name: string,
     *      code: string,
     *      price: ?array{amount: string, currency: string},
     * }>
     */
    public function findActive(int $limit, int $offset): array;

    /**
     * @param int $id
     * @return array|null
     */
    public function findActiveById(int $id): ?array;

    /**
     * @return int
     */
    public function countActive(): int;
}
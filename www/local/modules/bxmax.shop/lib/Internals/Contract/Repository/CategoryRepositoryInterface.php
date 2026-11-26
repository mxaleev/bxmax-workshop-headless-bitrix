<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Contract\Repository;

interface CategoryRepositoryInterface
{
    /**
     * @return array
     */
    public function findActive(): array;

    /**
     * @param int $id
     * @return array|null
     */
    public function findActiveById(int $id): ?array;
}
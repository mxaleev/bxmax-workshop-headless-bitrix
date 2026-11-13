<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Contract\Repository;

interface CategoryRepositoryInterface
{
    /**
     * @return array
     */
    public function findActive(): array;
}
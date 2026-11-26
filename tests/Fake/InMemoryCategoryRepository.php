<?php declare(strict_types=1);

namespace Tests\Fake;

use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;

final readonly class InMemoryCategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private array $categories,
    ) {}

    /**
     * @return array
     */
    public function findActive(): array
    {
        return $this->categories;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findActiveById(int $id): ?array
    {
        // TODO: Нужна ли эта операция?
        // Добавил для того, чтобы было удобнее работать с переменной без $this
        $categories = $this->categories;

        $key = array_search($id, array_column($categories, 'id'), true);
        return ($key !== false) ? $categories[$key] : null;
    }
}
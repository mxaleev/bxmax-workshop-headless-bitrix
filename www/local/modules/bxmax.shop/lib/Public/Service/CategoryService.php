<?php declare(strict_types=1);

namespace Bxmax\Shop\Public\Service;

use Bitrix\Main\Error;
use Bitrix\Main\Result;
use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;
use Bxmax\Shop\Public\Enum\ErrorCode;

final class CategoryService
{
    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository,
    ) {}

    /**
     * @return Result
     */
    public function getListActive(): Result
    {
        $items = $this->categoryRepository->findActive();

        // TODO: Вынести в параметр
        // Вывод в виде дерева
        // $items = $this->buildTreeFromNestedSets($items);

        return new Result()->setData([
            'items' => $items
        ]);
    }

    /**
     * TODO: Нужно ли разделять сервисы на List и View если используется один и тот же репозиторий?
     *
     * @param int $id
     * @return Result
     */
    public function getById(int $id): Result
    {
        $category = $this->categoryRepository->findActiveById($id);

        if ($category === null) {
            return new Result()->addError(new Error('Категория не найдена', ErrorCode::CategoryNotFound->value));
        }

        return new Result()->setData($category);
    }

    /**
     * TODO: Вопрос buildTreeFromNestedSets
     * Где хранить подобные функции, вынести в Helpers (или что-то другое)?
     *
     * Формирование дерева элементов
     * @param array $items
     * @return array
     */
    private function buildTreeFromNestedSets(array $items): array
    {
        $tree = [];
        $stack = [];

        foreach ($items as $item) {
            $item['children'] = [];

            // Убираем из стека элементы, которые не являются родителями для текущего
            while (!empty($stack) && $stack[count($stack) - 1]['right_margin'] < $item['right_margin']) {
                array_pop($stack);
            }

            if (empty($stack)) {
                // Если стек пуст, это корневой элемент
                $tree[] = $item;
                $stack[] = &$tree[count($tree) - 1];
            } else {
                // Добавляем текущий элемент в children последнего элемента в стеке
                $parentIndex = count($stack) - 1;
                $stack[$parentIndex]['children'][] = $item;
                $lastChildIndex = count($stack[$parentIndex]['children']) - 1;
                $stack[] = &$stack[$parentIndex]['children'][$lastChildIndex];
            }
        }

        return $tree;
    }
}
<?php declare(strict_types=1);

namespace Bxmax\Shop\Public\Service;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\Result;
use Bitrix\Main\SystemException;
use Bxmax\Shop\Internals\Repository\CategoryRepository;
use ErrorException;

final class CategoryService
{
    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        private CategoryRepository $categoryRepository,
    ) {}

    /**
     * @return Result
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ErrorException
     */
    public function getListActive(): Result
    {
        $items = $this->categoryRepository->findActive();

        // Перестройка массива для вывода в виде дерева
        $items = $this->buildTreeFromNestedSets($items);

        return (new Result())->setData([
            'items' => $items
        ]);
    }

    /**
     * TODO: Вынести в Helpers (или что-то другое)
     * !!! Сгенерировано через нейросеть
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
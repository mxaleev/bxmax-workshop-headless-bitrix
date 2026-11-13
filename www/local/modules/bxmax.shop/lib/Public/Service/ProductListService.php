<?php declare(strict_types=1);

namespace Bxmax\Shop\Public\Service;

use Bitrix\Main\Result;
use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final class ProductListService
{
    private const MAX_PAGE_SIZE = 50;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @param int $page
     * @param int $pageSize
     * @return Result
     */
    public function getPage(int $page, int $pageSize): Result
    {
        $page = max(1, $page);
        $pageSize = min(self::MAX_PAGE_SIZE, max(1, $pageSize));
        $offset = ($page - 1) * $pageSize;

        return (new Result())->setData([
            'items' => $this->productRepository->findActive($pageSize, $offset),
            'meta' => [
                'page' => $page,
                'pageSize' => $pageSize,
                'total' => $this->productRepository->countActive(),
            ],
        ]);
    }
}
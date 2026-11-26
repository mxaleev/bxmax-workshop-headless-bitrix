<?php declare(strict_types=1);

namespace Bxmax\Shop\Public\Service;

use Bitrix\Main\Error;
use Bitrix\Main\Result;
use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final class ProductViewService
{
    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @param int $id
     * @return Result
     */
    public function getById(int $id): Result
    {
        $product = $this->productRepository->findActiveById($id);

        if ($product === null) {
            return new Result()->addError(new Error('Товар не найден', 'PRODUCT_NOT_FOUND'))->setData([]);
        }

        return new Result()->setData($product);
    }
}

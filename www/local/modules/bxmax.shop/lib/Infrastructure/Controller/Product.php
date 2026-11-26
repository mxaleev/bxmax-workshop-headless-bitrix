<?php declare(strict_types=1);

namespace Bxmax\Shop\Infrastructure\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bxmax\Shop\Public\Service\ProductListService;
use Bxmax\Shop\Public\Service\ProductViewService;

final class Product extends ApiController
{
    protected function getDefaultPreFilters(): array
    {
        return [];
    }

    public function configureActions(): array
    {
        return [
            'list' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_GET]),
                    new ActionFilter\CloseSession(),
                ],
            ],
        ];
    }

    /**
     * @param ProductListService $productListService
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function listAction(ProductListService $productListService, int $page = 1, int $pageSize = 20): array
    {
        return $this->respond($productListService->getPage($page, $pageSize));
    }

    /**
     * @param ProductViewService $productViewService
     * @param int $id
     * @return array
     */
    public function getAction(ProductViewService $productViewService, int $id): array
    {
        return $this->respond($productViewService->getById($id));
    }
}
<?php declare(strict_types=1);

namespace Bxmax\Shop\Infrastructure\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;
use Bxmax\Shop\Public\Service\ProductListService;

final class Product extends Controller
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
    public function listAction(
        ProductListService $productListService,
        int $page = 1,
        int $pageSize = 20
    ): array
    {
        return $productListService->getPage($page, $pageSize)->getData();
    }
}
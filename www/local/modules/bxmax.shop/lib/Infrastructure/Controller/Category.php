<?php declare(strict_types=1);

namespace Bxmax\Shop\Infrastructure\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bxmax\Shop\Public\Service\CategoryService;

final class Category extends ApiController
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
     * @param CategoryService $categoryService
     * @return array
     */
    public function listAction(CategoryService $categoryService): array
    {
        return $this->respond($categoryService->getListActive());
    }

    /**
     * @param CategoryService $categoryService
     * @param int $id
     * @return array
     */
    public function getAction(CategoryService $categoryService, int $id): array
    {
        return $this->respond($categoryService->getById($id));
    }
}
<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;

final class IblockProductRepository implements ProductRepositoryInterface
{
    /**
     * @param int $limit
     * @param int $offset
     * @return array|array[]
     */
    public function findActive(int $limit, int $offset): array
    {
        $data = \CIBlockElement::GetList(
            ['NAME' => 'ASC'],
            ['ACTIVE' => 'Y'],
            false,
            false,
            ['ID', 'NAME', 'CATALOG_PRICE_1']
        );

        $res = [];
        while($obElement = $data->Fetch()) {
            $res[] = $obElement;
        }

        return $res;
    }

    /**
     * @return int
     */
    public function countActive(): int
    {
        return 0;
    }
}
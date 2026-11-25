<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bitrix\Catalog\PriceTable;
use Bitrix\Iblock\Elements\ElementClothesTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\SystemException;
use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;
use Bxmax\Shop\Internals\Repository\Mapper\ProductMapper;

final class IblockProductRepository implements ProductRepositoryInterface
{
    /**
     * @param int $limit
     * @param int $offset
     * @return array|array[]
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ArgumentException
     */
    public function findActive(int $limit, int $offset): array
    {
        $rows = ElementClothesTable::getList([
            'select' => [
                'ID',
                'NAME',
                'CODE',
                'PRICE_AMOUNT' => 'BASE_PRICE.PRICE',
                'PRICE_CURRENCY' => 'BASE_PRICE.CURRENCY',
            ],
            'filter' => [
                '=ACTIVE' => 'Y'
            ],
            'order' => [
                'SORT' => 'ASC',
                'ID' => 'ASC'
            ],
            'limit' => $limit,
            'offset' => $offset,
            'runtime' => [$this->getBasePriceReference()],
        ])->fetchAll();

        return array_map(ProductMapper::convertFromRow(...), $rows);
    }

    /**
     * @param int $id
     * @return array|null
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function findActiveById(int $id): ?array
    {
        $row =  ElementClothesTable::getByPrimary($id, [
            'select' => [
                'ID',
                'NAME',
                'CODE',
                'PRICE_AMOUNT' => 'BASE_PRICE.PRICE',
                'PRICE_CURRENCY' => 'BASE_PRICE.CURRENCY',
            ],
            'filter' => ['=ACTIVE'=>'Y'],
            'runtime' => [$this->getBasePriceReference()],
        ])->fetch();

        return $row === false ? null : ProductMapper::convertFromRow($row);
    }

    /**
     * @return int
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function countActive(): int
    {
        return ElementClothesTable::getCount(['=ACTIVE' => 'Y']);
    }

    /**
     * Цена базового типа одним JOIN: товар без цены приходит с PRICE_AMOUNT = null.
     *
     * @return Reference
     * @throws ArgumentException
     * @throws SystemException
     */
    private function getBasePriceReference(): Reference
    {
        return new Reference(
            'BASE_PRICE',
            PriceTable::class,
            Join::on('this.ID', 'ref.PRODUCT_ID'),
            ['join_type' => Join::TYPE_LEFT]
        );
    }
}
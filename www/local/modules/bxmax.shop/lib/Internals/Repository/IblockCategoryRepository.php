<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bitrix\Catalog\Infrastructure\Rest\Dto\Mapping\CatalogMapper;
use Bitrix\Iblock\EO_Section;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;
use Bxmax\Shop\Internals\Repository\Mapper\CategoryMapper;
use ErrorException;

final class IblockCategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return array|array[]
     * @throws ArgumentException
     * @throws ErrorException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function findActive(): array
    {
        // TODO: Символьный код ИБ вынести в отдельную сущность
        // Символьный код инфоблока
        $code = 'clothes';
        $iBlockId = $this->getIblockIdByCode($code);

        $sections = SectionTable::getList([
            'select' => [
                'ID',
                'IBLOCK_SECTION_ID',
                'NAME',
                'CODE',
                'DEPTH_LEVEL',
                'LEFT_MARGIN',
                'RIGHT_MARGIN',
            ],
            'filter' => [
                '=IBLOCK_ID' => $iBlockId,
                '=GLOBAL_ACTIVE' => 'Y',
                '=ACTIVE' => 'Y',
            ],
            'order' => [
                'LEFT_MARGIN' => 'ASC',
            ],
        ])->fetchCollection();

        return array_map(
            CategoryMapper::convertFromRow(...),
            iterator_to_array($sections, false)
        );
    }

    /**
     * @param int $id
     * @return array|null
     * @throws ArgumentException
     * @throws ErrorException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function findActiveById(int $id): ?array
    {
        // TODO: Символьный код ИБ вынести в отдельную сущность
        // Символьный код инфоблока
        $code = 'clothes';
        $iBlockId = $this->getIblockIdByCode($code);

        $rsSections = SectionTable::getByPrimary($id, [
            'select' => [
                'ID',
                'IBLOCK_SECTION_ID',
                'NAME',
                'CODE',
                'DEPTH_LEVEL',
                'LEFT_MARGIN',
                'RIGHT_MARGIN',
            ],
            'filter' => [
                '=IBLOCK_ID' => $iBlockId,
                '=ACTIVE' => 'Y',
            ]
        ])->fetchObject();

        if (!$rsSections instanceof EO_Section) {
            return null;
        }

        return CategoryMapper::convertFromRow($rsSections);
    }

    /**
     * TODO: Вынести в Helpers (или что-то другое)
     * @param string $code
     * @return int
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ErrorException
     */
    private function getIblockIdByCode(string $code): int
    {
        $iblock = IblockTable::getList([
            'select' => ['ID'],
            'filter' => ['CODE' => $code],
            'limit'  => 1,
        ])->fetchObject();

        if (!$iblock instanceof Iblock) {
            throw new ErrorException('Инфоблок не найден');
        }

        return $iblock->getId();
    }
}
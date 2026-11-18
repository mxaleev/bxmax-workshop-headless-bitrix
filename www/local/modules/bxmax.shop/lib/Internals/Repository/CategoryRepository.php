<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;
use ErrorException;

final class CategoryRepository implements CategoryRepositoryInterface
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

        $rsSections = SectionTable::getList([
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
            ],
            'order' => [
                'LEFT_MARGIN' => 'ASC',
            ],
        ])->fetchCollection();

        $sections = [];
        foreach ($rsSections as $section) {
            $sections[] = [
                'id' => $section->getId(),
                'name' => $section->getName(),
                'code' => $section->getCode(),
                'depth_level' => $section->getDepthLevel(),
                'left_margin' => $section->getLeftMargin(),
                'right_margin' => $section->getRightMargin()
            ];
        }

        return $sections;
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
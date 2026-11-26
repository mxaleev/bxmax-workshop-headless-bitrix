<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository;

use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\FileTable;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
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
        $iBlockId = $this->getIblockClothes();
        $sectionEntity = $this->getSectionEntity($iBlockId);

        $sections = $sectionEntity::getList([
            'select' => $this->getSelectDefault(),
            'filter' => $this->getFilterDefault($iBlockId),
            'order' => [
                'LEFT_MARGIN' => 'ASC',
            ],
            'runtime' => [$this->getBackgroundImageReference()],
        ])->fetchAll();

        return array_map(CategoryMapper::convertFromRow(...), $sections);
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
        $iBlockId = $this->getIblockClothes();
        $sectionEntity = $this->getSectionEntity($iBlockId);

        $sections = $sectionEntity::getByPrimary($id, [
            'select' => $this->getSelectDefault(),
            'filter' => $this->getFilterDefault($iBlockId),
            'runtime' => [$this->getBackgroundImageReference()],
        ])->fetch();

        if (!$sections) {
            return null;
        }

        return CategoryMapper::convertFromRow($sections);
    }

    /**
     * @return string[]
     */
    private function getSelectDefault(): array
    {
        return [
            'ID',
            'IBLOCK_SECTION_ID',
            'NAME',
            'CODE',
            'DEPTH_LEVEL',
            'LEFT_MARGIN',
            'RIGHT_MARGIN',
            'BACKGROUND_IMAGE_FILE_' => 'BACKGROUND_IMAGE_FILE.*',
        ];
    }

    /**
     * @param int $iBlockId
     * @return array
     */
    private function getFilterDefault(int $iBlockId): array
    {
        return [
            '=IBLOCK_ID' => $iBlockId,
            '=GLOBAL_ACTIVE' => 'Y',
            '=ACTIVE' => 'Y',
        ];
    }

    /**
     * @return Reference
     * @throws ArgumentException
     * @throws SystemException
     */
    private function getBackgroundImageReference(): Reference
    {
        return new Reference(
            'BACKGROUND_IMAGE_FILE',
            FileTable::class,
            Join::on('this.UF_BACKGROUND_IMAGE', 'ref.ID'),
            ['join_type' => Join::TYPE_LEFT]
        );
    }

    /**
     * @param int $iBlockId
     * @return string|SectionTable|null
     * @throws ArgumentException
     * @throws ErrorException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getSectionEntity(int $iBlockId): string|SectionTable|null
    {
        return Section::compileEntityByIblock($iBlockId);
    }

    /**
     * TODO: Вынести в Helpers (или что-то другое)
     *
     * @return int
     * @throws ArgumentException
     * @throws ErrorException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function getIblockClothes(): int
    {
        $code = 'clothes';

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
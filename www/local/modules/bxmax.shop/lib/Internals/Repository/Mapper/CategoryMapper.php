<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository\Mapper;

use Bitrix\Iblock\EO_Section;

/**
 * Строка из инфоблока → товар в форме контракта API. Единственное место, где поля базы
 * превращаются в поля ответа.
 */
final class CategoryMapper
{
    /**
     * TODO: Вопрос CategoryMapper::convertFromRow
     * Стоит ли в репозитории получать объекты и потом с этими объектами работать в маппере?
     *
     * @param EO_Section $section
     * @return array
     */
    public static function convertFromRow(EO_Section $section): array
    {
        return [
            'id' => (int)$section->getId(),
            'name' => (string)$section->getName(),
            'code' => (string)$section->getCode(),
            'depth_level' => (int)$section->getDepthLevel(),
            'left_margin' => (int)$section->getLeftMargin(),
            'right_margin' => (int)$section->getRightMargin()
        ];
    }
}

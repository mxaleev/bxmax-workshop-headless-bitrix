<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository\Mapper;

/**
 * Строка из инфоблока → категория в форме контракта API. Единственное место, где поля базы
 * превращаются в поля ответа.
 */
final class CategoryMapper
{
    /**
     * @param array $row
     * @return array
     */
    public static function convertFromRow(array $row): array
    {
        return [
            'id' => (int)$row['ID'],
            'name' => (string)$row['NAME'],
            'code' => (string)$row['CODE'],
            'depthLevel' => (int)$row['DEPTH_LEVEL'],
            'leftMargin' => (int)$row['LEFT_MARGIN'],
            'rightMargin' => (int)$row['RIGHT_MARGIN'],
            'backgroundImage' => FileMapper::convertFromRow($row, 'BACKGROUND_IMAGE_FILE_'),
        ];
    }
}

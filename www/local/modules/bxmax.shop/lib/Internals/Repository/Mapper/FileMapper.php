<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository\Mapper;

/**
 * Маппер для файлов
 */
final class FileMapper
{
    public static function convertFromRow(array $row, string $prefix = ''): ?array
    {
        $id = $row[$prefix . 'ID'] ?? null;

        if (empty($id)) {
            return null;
        }

        $subDir = (string)($row[$prefix.'SUBDIR'] ?? '');
        $fileName = (string)($row[$prefix.'FILE_NAME'] ?? '');

        return [
            'id' => (int)$id,
            'src' => ($subDir !== '' && $fileName !== '') ? '/upload/'.$subDir.'/'.$fileName : null,
            'originalName' => (string)($row[$prefix.'ORIGINAL_NAME'] ?? ''),
            'contentType' => (string)($row[$prefix.'CONTENT_TYPE'] ?? ''),
            'size' => (int)($row[$prefix.'FILE_SIZE'] ?? 0),
            'width' => isset($row[$prefix.'WIDTH']) ? (int)$row[$prefix.'WIDTH'] : null,
            'height' => isset($row[$prefix.'HEIGHT']) ? (int)$row[$prefix.'HEIGHT'] : null,
        ];
    }
}

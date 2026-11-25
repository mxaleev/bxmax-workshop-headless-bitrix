<?php declare(strict_types=1);

namespace Bxmax\Shop\Internals\Repository\Mapper;

/**
 * Строка из инфоблока → товар в форме контракта API. Единственное место, где поля базы
 * превращаются в поля ответа.
 */
final class ProductMapper
{
    /**
     * @param array{ID: int|string, NAME: string, CODE: ?string, PRICE_AMOUNT: float|string|null, PRICE_CURRENCY: ?string} $row
     * @return array{id: int, name: string, code: string, price: ?array{amount: string, currency: string}}
     */
    public static function convertFromRow(array $row): array
    {
        return [
            'id' => (int)$row['ID'],
            'name' => (string)$row['NAME'],
            'code' => (string)$row['CODE'],
            'price' => self::convertPrice(
                $row['PRICE_AMOUNT'] ?? null,
                    $row['PRICE_CURRENCY'] ?? null
            ),
        ];
    }

    /**
     * @return ?array{amount: string, currency: string}
     */
    private static function convertPrice(float|string|null $amount, ?string $currency): ?array
    {
        if ($amount === null || $currency === null) {
            return null;
        }

        return [
            'amount' => number_format((float)$amount, 2, '.', ''),
            'currency' => $currency,
        ];
    }
}

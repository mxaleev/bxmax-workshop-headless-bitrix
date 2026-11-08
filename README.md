# Headless Bitrix — код воркшопа

API магазина на штатных механизмах ядра 1С-Битрикс: роутинг, `Engine\Controller`, `ServiceLocator`, конверт ответа.
Сквозной проект воркшопа «Headless Bitrix» (BXMax), модуль `bxmax.shop`.

## Что лежит в репозитории

Репозиторий — корень сайта Omut `~/Omut/shop.bitrix`. Git отслеживает только код проекта:

- `www/local/` — модуль `www/local/modules/bxmax.shop`, маршруты `www/local/routes/api.php`, настройки `www/local/.settings_extra.php`;
- `contract/` — эталонные ответы API;
- `README.md`.

Ядро (`www/bitrix/`), `www/upload/`, `vendor/` и `/bitrix/.settings.php` с паролем от базы в репозиторий не попадают.

## Требования

- Omut, сайт `shop.bitrix`, установка «Под ключ», редакция «Малый бизнес» или «Бизнес»;
- main 25.900+ (проверено на 26.1000), PHP 8.2+;
- `composer install` в корне сайта, чтобы работала консоль `php www/bitrix/bitrix.php`.

## Теги

| Тег | Состояние |
| --- | --- |
| `start` | пустой `www/local/`, исходная точка |
| `session-01` | конец занятия 1: health, список товаров на заглушке, контракт ответа |

Внутри занятия шаги отмечены тегами `cp-NN-*`. Отстали — переключитесь на тег и продолжайте:

```bash
git switch --detach cp-03-health
```

Переключение тега не меняет базу: модуль, установленный из админки, остаётся установленным.

<?php declare(strict_types=1);

use Bitrix\Main\Routing\RoutingConfigurator;
use Bxmax\Shop\Infrastructure\Controller\Category;
use Bxmax\Shop\Infrastructure\Controller\Health;
use Bxmax\Shop\Infrastructure\Controller\Product;

return static function (RoutingConfigurator $routes): void {
    $routes->prefix('api/v1')->group(static function (RoutingConfigurator $routes): void {
        $routes->get('health', [Health::class, 'check']);
        $routes->get('categories', [Category::class, 'list']);
        $routes->get('products', [Product::class, 'list']);
    });
};
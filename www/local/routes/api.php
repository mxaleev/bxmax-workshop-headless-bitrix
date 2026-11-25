<?php declare(strict_types=1);

use Bitrix\Main\Engine\Response\Json;
use Bitrix\Main\Routing\RoutingConfigurator;
use Bxmax\Shop\Infrastructure\Controller\Category;
use Bxmax\Shop\Infrastructure\Controller\Health;
use Bxmax\Shop\Infrastructure\Controller\Product;

return static function (RoutingConfigurator $routes): void {
    $routes->prefix('api/v1')->group(static function (RoutingConfigurator $routes): void {
        $routes->get('health', [Health::class, 'check']);
        $routes->get('categories', [Category::class, 'list']);
        $routes->get('products', [Product::class, 'list']);
        $routes->get('products/{id}', [Product::class, 'get'])->where('id', '[0-9]+');

        $routes->any('{any}', function () {
            $response = new Json([
                'status' => 'error',
                'message' => 'Not Found'
            ]);
            $response->setStatus(404);
            return $response;
        })->where('any', '.*');
    });
};
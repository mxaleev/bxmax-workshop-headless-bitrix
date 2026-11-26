<?php declare(strict_types=1);

use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;
use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;
use Bxmax\Shop\Internals\Repository\IblockCategoryRepository;
use Bxmax\Shop\Internals\Repository\IblockProductRepository;

return [
    'controllers' => [
        'value' => [
            'defaultNamespace' => '\\Bxmax\\Shop\\Infrastructure\\Controller',
        ],
        'readonly' => true,
    ],
    'services' => [
        'value' => [
            CategoryRepositoryInterface::class => [
                'className' => IblockCategoryRepository::class,
            ],
            ProductRepositoryInterface::class => [
                'className' => IblockProductRepository::class,
            ],
        ],
        'readonly' => true,
    ],
];
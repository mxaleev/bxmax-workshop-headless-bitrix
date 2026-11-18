<?php declare(strict_types=1);

use Bxmax\Shop\Internals\Contract\Repository\CategoryRepositoryInterface;
use Bxmax\Shop\Internals\Contract\Repository\ProductRepositoryInterface;
use Bxmax\Shop\Internals\Repository\ArrayProductRepository;
use Bxmax\Shop\Internals\Repository\CategoryRepository;

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
                'className' => CategoryRepository::class,
            ],
            ProductRepositoryInterface::class => [
                'className' => ArrayProductRepository::class,
            ],
        ],
        'readonly' => true,
    ],
];
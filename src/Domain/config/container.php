<?php

use ZnBundle\Dashboard\Domain\Services\DashboardService;
use Psr\Container\ContainerInterface;

return [
    'singletons' => [
        'ZnBundle\Dashboard\Domain\Interfaces\Services\DocServiceInterface' => 'ZnBundle\Dashboard\Domain\Services\DocService',
//        'ZnBundle\\Dashboard\\Domain\\Interfaces\\Services\\DashboardServiceInterface' => function (ContainerInterface $container) {
//            /** @var DashboardService $service */
//            $service = $container->get(DashboardService::class);
//            $config = include __DIR__ . '/../../../../frontend/config/extra/dashboard.php';
//            $service->setConfig($config);
//            return $service;
//        },
    ],
];
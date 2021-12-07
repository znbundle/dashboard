<?php

namespace ZnBundle\Dashboard\Symfony4\Web\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ZnBundle\Dashboard\Domain\Enums\Rbac\AppPersonPermissionEnum;
use ZnBundle\Dashboard\Domain\Enums\Rbac\DashboardPermissionEnum;
use ZnBundle\Dashboard\Domain\Interfaces\Services\DashboardServiceInterface;
use ZnBundle\Dashboard\Domain\Interfaces\Services\PersonServiceInterface;
use ZnCore\Domain\Exceptions\UnprocessibleEntityException;
use ZnLib\Web\Symfony4\MicroApp\BaseWebController;
use ZnLib\Web\Symfony4\MicroApp\Interfaces\ControllerAccessInterface;
use ZnLib\Web\Symfony4\MicroApp\Traits\ControllerFormTrait;

class DashboardController extends BaseWebController implements ControllerAccessInterface
{

    use ControllerFormTrait;

    protected $viewsDir = __DIR__ . '/../views/dashboard';
    protected $service;

    public function __construct(
        DashboardServiceInterface $service
    )
    {
        $this->service = $service;
    }
    
    public function access(): array
    {
        return [
            'index' => [
                DashboardPermissionEnum::ALL,
            ],
        ];
    }

    public function index(Request $request): Response
    {
        return $this->render('index', [
            'widgetConfigList' => $this->service->all(),
        ]);
    }
}

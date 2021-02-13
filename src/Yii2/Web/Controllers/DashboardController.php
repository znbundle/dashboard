<?php

namespace ZnBundle\Dashboard\Yii2\Web\Controllers;

use ZnBundle\Dashboard\Domain\Enums\Rbac\DashboardPermissionEnum;
use ZnBundle\Dashboard\Domain\Interfaces\Services\DashboardServiceInterface;
use yii\filters\AccessControl;
use yii\web\Controller;

class DashboardController extends Controller
{

    private $service;

    public function __construct(
        $id, $module, $config = [],
        DashboardServiceInterface $service
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [DashboardPermissionEnum::ALL],
                        'actions' => ['index'],
                    ],
                ],
            ],
        ];
    }*/

    public function actionIndex()
    {
        return $this->render('/../../Web/views/dashboard/index', [
            'widgetConfigList' => $this->service->all(),
        ]);
    }
}

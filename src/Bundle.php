<?php

namespace ZnBundle\Dashboard;

use ZnCore\Base\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function yiiAdmin(): array
    {
        return $this->yiiWeb();
    }

    public function yiiWeb(): array
    {
        return [
            'modules' => [
                'dashboard' => [
                    'class' => __NAMESPACE__ . '\Yii2\Web\Module'
                ],
            ],
        ];
    }

    public function i18next(): array
    {
        return [
            'dashboard' => 'vendor/znbundle/dashboard/src/Domain/i18next/__lng__/__ns__.json',
        ];
    }

    public function migration(): array
    {
        return [

        ];
    }

    public function container(): array
    {
        return [
            __DIR__ . '/Domain/config/container.php',
        ];
    }
}

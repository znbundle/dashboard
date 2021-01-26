<?php

namespace ZnBundle\Dashboard;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function yiiAdmin(): array
    {
        return [

        ];
    }

    public function yiiWeb(): array
    {
        return [
            'modules' => [
                'dashboard' => 'ZnBundle\Dashboard\Yii2\Web\Module',
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
            [__DIR__ . '/Domain/config/container.php', 'singletons'],
        ];
    }
}

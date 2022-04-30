<?php

namespace ZnBundle\Dashboard\Yii2\Web\Controllers;

use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex()
    {
        prr('test');
        return $this->render('index');
    }

}

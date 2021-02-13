<?php

namespace ZnBundle\Dashboard\Yii2\Web\Controllers;

use yii\web\Controller;

class DefaultBlankController extends Controller
{
	
	public function actionIndex()
	{
        return $this->render('index', ['data' => '']);
	}

    public function actionTest()
    {
        return $this->render('test', ['data' => '']);
    }

}

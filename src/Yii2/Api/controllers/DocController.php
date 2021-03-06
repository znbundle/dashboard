<?php

namespace ZnBundle\Dashboard\Yii2\Api\controllers;

use ZnCore\Base\Exceptions\NotFoundException;
use ZnBundle\Dashboard\Domain\Interfaces\Services\DocServiceInterface;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DocController extends Controller
{

    private $docService;
    public $layout = 'main';

    public function __construct($id, $module, $config = [], DocServiceInterface $docService)
    {
        parent::__construct($id, $module, $config);
        $this->docService = $docService;
        Yii::$app->response->format = Response::FORMAT_HTML;
    }

    public function actionIndex()
    {
        $versionList = $this->docService->versionList();
        return $this->render('index', [
            'versionList' => $versionList,
        ]);
    }

    public function actionShow()
    {
        $version = API_VERSION_STRING;
        $version = str_replace('v', '', $version);
        try {
            $htmlContent = $this->docService->htmlByVersion($version);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException("Not found API documentation for version v{$version}!");
        }
        return $htmlContent;
    }
}

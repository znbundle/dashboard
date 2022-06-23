<?php

/**
 * @var View $this
 * @var array $widgetConfigList
 */

use ZnBundle\Dashboard\Yii2\Widgets\Dashboard\DashboardWidget;
use yii\web\View;
use ZnCore\Base\I18Next\Facades\I18Next;

$this->title = I18Next::t('dashboard', 'main.title');

?>

<?= DashboardWidget::widget([
    'items' => $widgetConfigList,
]) ?>

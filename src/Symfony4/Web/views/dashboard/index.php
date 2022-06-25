<?php

/**
 * @var View $this
 * @var array $widgetConfigList
 */

use ZnBundle\Dashboard\Yii2\Widgets\Dashboard\DashboardWidget;
use yii\web\View;
use ZnLib\Components\I18Next\Facades\I18Next;

$this->title = I18Next::t('dashboard', 'main.title');

?>

<?= DashboardWidget::widget([
    'rowTemplate' => '<div class="row mb-4">{html}</div>',
    'items' => $widgetConfigList,
]) ?>

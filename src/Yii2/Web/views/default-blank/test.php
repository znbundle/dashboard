<?php

/* @var $this yii\web\View */

$this->title = Yii::t('dashboard/main', 'title');

$data = empty($data) ? '' : $data;

?>

<div class="welcome-index">

    <?= $data ?>

</div>

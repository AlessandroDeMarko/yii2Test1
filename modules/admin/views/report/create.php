<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = 'Создать отчет';
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

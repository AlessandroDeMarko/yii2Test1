<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Создать предприятие';
$this->params['breadcrumbs'][] = ['label' => 'Предприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

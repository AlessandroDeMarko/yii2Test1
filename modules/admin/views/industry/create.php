<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Industry */

$this->title = 'Создать отрасль';
$this->params['breadcrumbs'][] = ['label' => 'Отрасли', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

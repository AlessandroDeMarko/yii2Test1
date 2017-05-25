<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Отчет №" . $this->title;
?>
<div class="report-view">

    <h1><?= "Отчет №" . Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [ 
                'label' => 'Предприятие',
                'value' => $model->company->name,            

            ],
            'amount_of_workers',
            'accruals',
            [ 
                'label' => 'Поставщик',
                'value' => $model->provider->name,            
            ],
            'period',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отчет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'company_id',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getCompanyName();
                },
            ],
            'amount_of_workers',
            'accruals',
            [
                'attribute'=>'provider_id',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getProviderName();
                },
            ],
            [
                'attribute'=>'period',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getFormatPeriod();
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

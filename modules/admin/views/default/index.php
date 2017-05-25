<?php
use app\models\Report;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div class="admin-default-index">
    <h1>Вывод информации</h1>
    <p>
        Для получения итогового отчета выберите, пожалуйста, период.
    </p>
 
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php   
        $model = new Report();

        $params = [
            'prompt' => 'Выберите период',
            'value' => $period ? $period : 0
        ];

        $items = Report::getListPeriod();

        echo $form->field($model, 'period')->dropDownList($items, $params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Применить фильтр', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Очистить фильтры', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Отрасль',
                'attribute'=>'company_id',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getIndustryName();
                },
            ],

            [
                'label' => 'Среднее по полю "Количество работников, чел.',
                'attribute'=>'amount_of_workers',
                'format'=>'text',
                'content'=>function($data){
                    return $data->name;
                },
            ],

            [
                'label' => 'Сумма по полю "Энергоснабжение: Сумма начислений, тыс. руб."',
                'attribute'=>'accruals',
                'format'=>'text',
                'content'=>function($data){
                    return $data->inn;
                },
            ],

        ],
    ]); ?>

</div>

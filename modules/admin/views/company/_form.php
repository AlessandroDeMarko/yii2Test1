<?php

use yii\helpers\ArrayHelper;
use app\models\Industry;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput() ?>

	<?php
        $industry = Industry::find()->all();

        $items = ArrayHelper::map($industry,'id','name');
        $params = [
            'prompt' => 'Выберите отрасль'
        ];
        echo $form->field($model, 'industry_id')->dropDownList($items, $params);    
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

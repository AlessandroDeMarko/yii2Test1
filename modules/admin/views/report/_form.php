<?php
use yii\helpers\ArrayHelper;
use app\models\Company;
use app\models\Provider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php     
        $company = Company::find()->all();

        $items = ArrayHelper::map($company,'id','name');
        $params = [
            'prompt' => 'Выберите предприятие'
        ];
        echo $form->field($model, 'company_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'amount_of_workers')->textInput() ?>

    <?= $form->field($model, 'accruals')->textInput() ?>

    <?php
        $provider = Provider::find()->all();

        $items = ArrayHelper::map($provider,'id','name');
        $params = [
            'prompt' => 'Выберите поставщика'
        ];
        echo $form->field($model, 'provider_id')->dropDownList($items,$params);    
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

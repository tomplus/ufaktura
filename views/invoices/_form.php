<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Invoices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoices-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="border: thin black solid; padding: 10px 10px 10px 10px;">
    <p><strong>Dane ogólne</strong></p>

    <?= $form->field($model, 'ivc_number')->textInput(['maxlength' => true, 'readonly' => True]) ?>

    <?= $form->field($model, 'ivc_pfl_id')->dropDownList($model->profileList) ?>

    <?= $form->field($model, 'ivc_cln_id')->dropDownList($model->clientList) ?>

    <?= $form->field($model, 'ivc_date_create')->widget(\yii\jui\DatePicker::classname(), ['language'=>'pl', 'dateFormat' => 'yyyy-MM-dd']) ?>

    </div>

    <br/>

    <div style="border: thin black solid; padding: 10px 10px 10px 10px;">
    <p><strong>Usługa</strong></p>

    <?= $form->field($model, 'ivc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ivc_count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ivc_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ivc_price')->textInput() ?>

    </div>

    <br/>

    <div style="border: thin black solid; padding: 10px 10px 10px 10px;">

    <?= $form->field($model, 'ivc_payment_method')->dropDownList(["gotówka" => "gotówka", "przelew" => "przelew"]) ?>

    </div>

    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

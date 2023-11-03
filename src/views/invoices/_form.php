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

    <?= $form->field($model, 'ivc_date_create', [ 'options' => ['style' => 'display: inline-block; width: 40%;']])->widget(\yii\jui\DatePicker::classname(), ['language'=>'pl', 'dateFormat' => 'yyyy-MM-dd']) ?>

    <strong>Numer faktury proforma</strong>
    <?= $form->field($model, 'number_proforma', [ 'options' => ['style' => 'display: inline-block; width: 30%;']])->textInput(['maxlength' => true])->label("") ?>


    <?php if ($model->isNewRecord == 0) { ?>
    <p><strong>* Uwaga:</strong> modyfikując datę wystawienia pamiętaj o utrzymaniu kolejności numeracji !</p>
    <?php } ?>

    </div>

    <br/>

    <div style="border: thin black solid; padding: 10px 10px 10px 10px;">
    <p><strong>Usługa</strong></p>

    <?php foreach (array('', '_2', '_3') as $suffix) { ?>
        <?= $form->field($model, 'ivc_name' . $suffix,
                         [ 'options' => ['style' => 'display: inline-block; width: 60%;']])->textInput(['maxlength' => true])->label( $suffix === '' ? 'Nazwa usługi' : '') ?>
        <?= $form->field($model, 'ivc_count' . $suffix,
                            [ 'options' => ['style' => 'display: inline-block; width: 10%;']])->textInput(['maxlength' => true])->label( $suffix === '' ? 'Ilość' : '') ?>
        <?= $form->field($model, 'ivc_unit' . $suffix,
                            [ 'options' => ['style' => 'display: inline-block; width: 10%;']])->textInput(['maxlength' => true])->label( $suffix === '' ? 'Jednostka' : '')  ?>
        <?= $form->field($model, 'ivc_price' . $suffix,
                            [ 'options' => ['style' => 'display: inline-block; width: 10%;']])->textInput()->label( $suffix === '' ? 'Cena jedn.' : '')  ?>

    <?php } ?>

    </div>

    <br/>

    <div style="border: thin black solid; padding: 10px 10px 10px 10px;">

    <?= $form->field($model, 'ivc_payment_method')->dropDownList([
            "gotówka" => "gotówka",
            "przelew" => "przelew",
            "gotówka, zapłacono" => "gotówka, zapłacono",
            "przelew, zapłacono" => "przelew, zapłacono"]) ?>

    </div>

    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

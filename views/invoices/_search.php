<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvoicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ivc_id') ?>

    <?= $form->field($model, 'ivc_number') ?>

    <?= $form->field($model, 'ivc_cln_id') ?>

    <?= $form->field($model, 'ivc_date_create') ?>

    <?= $form->field($model, 'ivc_date_sale') ?>

    <?php // echo $form->field($model, 'ivc_name') ?>

    <?php // echo $form->field($model, 'ivc_count') ?>

    <?php // echo $form->field($model, 'ivc_unit') ?>

    <?php // echo $form->field($model, 'ivc_price') ?>

    <?php // echo $form->field($model, 'ivc_value') ?>

    <?php // echo $form->field($model, 'ivc_date_payment') ?>

    <?php // echo $form->field($model, 'ivc_payment_method') ?>

    <?php // echo $form->field($model, 'ivc_ts_insert') ?>

    <?php // echo $form->field($model, 'ivc_ts_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

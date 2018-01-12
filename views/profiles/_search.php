<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pfl_id') ?>

    <?= $form->field($model, 'pfl_name_1') ?>

    <?= $form->field($model, 'pfl_name_2') ?>

    <?= $form->field($model, 'pfl_name_3') ?>

    <?= $form->field($model, 'pfl_name_4') ?>

    <?php // echo $form->field($model, 'pfl_name_5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

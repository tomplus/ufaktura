<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pfl_name_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pfl_name_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pfl_name_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pfl_name_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pfl_name_5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

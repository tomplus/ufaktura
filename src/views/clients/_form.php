<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cln_name_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cln_name_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cln_name_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cln_name_4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

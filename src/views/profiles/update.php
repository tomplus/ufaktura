<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profiles */

$this->title = 'Update Profiles: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pfl_id, 'url' => ['view', 'id' => $model->pfl_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

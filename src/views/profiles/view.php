<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profiles */

$this->title = $model->pfl_id;
?>
<div class="profiles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edycja', ['update', 'id' => $model->pfl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->pfl_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy chcesz usunąć profil?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pfl_id',
            'pfl_name_1',
            'pfl_name_2',
            'pfl_name_3',
            'pfl_name_4',
            'pfl_name_5',
            'pfl_name_6',
            'pfl_invoice_note',
    ],
    ]) ?>

</div>

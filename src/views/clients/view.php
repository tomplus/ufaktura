<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */

$this->title = $model->cln_id;
?>
<div class="clients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edycja', ['update', 'id' => $model->cln_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->cln_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy chcesz usunąć klienta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cln_id',
            'cln_name_1',
            'cln_name_2',
            'cln_name_3',
            'cln_name_4',
            'cln_name_5',
            'cln_name_6',
        ],
    ]) ?>

</div>

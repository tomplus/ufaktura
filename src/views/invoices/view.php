<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Invoices */

$this->title = $model->ivc_number;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Drukuj', ['print', 'id' => $model->ivc_id], ['class' => 'btn btn-info']) ?> &nbsp;
        <?= Html::a('Popraw', ['update', 'id' => $model->ivc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->ivc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ivc_number',
            'ivc_pfl_id',
            'ivcCln.cln_name_1',
            'ivc_date_create',
            'ivc_date_sale',
            'ivc_name',
            'ivc_count',
            'ivc_unit',
            'ivc_price',
            'ivc_name_2',
            'ivc_count_2',
            'ivc_unit_2',
            'ivc_price_2',
            'ivc_name_3',
            'ivc_count_3',
            'ivc_unit_3',
            'ivc_price_3',
            'ivc_value',
            'ivc_date_payment',
            'ivc_payment_method',
            'ivc_ts_insert',
            'ivc_ts_update',
        ],
    ]) ?>

</div>

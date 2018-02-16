<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Invoices */

$this->title = 'Nowa faktura';
?>
<div class="invoices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profiles */

$this->title = 'Nowy profil';
?>
<div class="profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

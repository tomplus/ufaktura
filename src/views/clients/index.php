<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\ClientSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Klienci';
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['method'=>'get', 'action' => '?r=clients/index']); ?>
    <?= $form->field($searchModel, 'search') ?>
    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Pokaż wszystkich', ['index'], ['class' => 'btn btn-info']) ?>
    &nbsp;
    <?= Html::a('Nowy klient', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
    <br/>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cln_name_1',
            'cln_name_2',
            'cln_name_3',
            'cln_name_4',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

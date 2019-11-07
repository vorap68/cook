<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderToday */

$this->title = 'Create Order Today';
$this->params['breadcrumbs'][] = ['label' => 'Order Todays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-today-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

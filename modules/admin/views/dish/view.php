<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UploadedFile;
use rico\yii2images;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dish */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dish-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?> 
    
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'foto',
                 'value' => "<img src='{$img->getUrl('150')}'>",
		'format' => 'html',
            ],
            'price',
        ],
    ]) ?>

</div>

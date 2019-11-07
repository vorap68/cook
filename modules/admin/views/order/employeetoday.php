<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
use yii\helpers\Html;
?>
<?= '<h2> Уважаемый ' . Yii::$app->user->identity->name . ' ваш заказ на сегодня </h2>' . date('Y-m-d') ?>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
	'name_dish',
	'price',
	['class' => 'yii\grid\ActionColumn',
	    'buttons' => [
		'update' => function ($myUrl, $model, $key) {

		    return Html::a('', '/admin/order/employeetoday', ['class' => 'glyphicon glyphicon-pencil']);
		}
		    ],
		'template'=> '{delete}'	    
		],
	    ]
	]);
	?>


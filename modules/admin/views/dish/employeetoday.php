<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
?>
<?= '<h2> Уважаемый '.$login.' ваш заказ на сегодня </h2>'.date('Y-m-d')?>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
	'name_dish',
	'price',
	]
	]);
	?>
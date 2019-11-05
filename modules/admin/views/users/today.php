<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;



?>


<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
	'login',
	'name_dish',
	'price',
	]
	]);
	?>
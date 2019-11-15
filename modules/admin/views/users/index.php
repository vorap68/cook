<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    'login',
	    'password',
	    'name',
	    'role',
	    ['attribute' => 'history',
		'format' => 'raw',
		'value' => function($data) {
		    return Html::a(
				    'Посмотреть', [
				'/admin/order/history', 'id' => $data->id]
		    );
		}
		    ]
		    ,
		    ['class' => 'yii\grid\ActionColumn',
			'template'=>'{update}{delete}'],
		],
	    ]);
	    ?>

</div>

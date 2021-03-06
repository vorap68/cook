<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;


$this->title = 'Dishes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dish-index">
     <p>
        <h1>Отметьте блюда сегодняшнего дня.</h1>
    </p>
    <?php $form = ActiveForm::begin(['action'=>'povartoday']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
	    'id',
            'name',
            'price',
	    ['attribute'=>'status',
		'format' => 'raw',
		'value' => function($data){
			    return $data->status ? '<span class="text-success">Доступно</span>' : '<span class="text-danger">Недоступно</span>';
				}
    ],
	     ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>

     <p>
   
	 <?= Html::a('Восстановить', 'povarreset',['class' => 'profile-link']) ?>
	 <?php echo Html::submitButton('Отправить', ['class' => 'submit','id'=>'today']) ;?>
    </p>
    
    <?php ActiveForm::end();?>
  
 
    
</div>

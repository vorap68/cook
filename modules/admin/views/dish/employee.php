<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


$this->title = 'Dishes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dish-index">
     <p>
        <h1>Выбор блюд на сегодня</h1>
    </p>
    <?php //debug($medias);?>
    <?php $form = ActiveForm::begin(['action'=>'employeetoday']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
	'filterModel' => $medias,
        'columns' => [
	    'id',
            'name',
            'price',
	    [
  'attribute' => 'count',
   'format' => 'raw',
  'value' =>  function($medias) use ($form) {
           return $form->field($medias, "count[$medias->id]")->textInput([                 
                 'class' => 'form-control',
            ])->hint('Введите количество ');
  }
				
],
	     
	    ['class' => 'yii\grid\CheckboxColumn'],
        ]
    ]); ?>

      <?php //echo $form->field($medias,'status')->textInput();?>
        <?= Html::submitButton('Отправить', ['class' => 'submit','id'=>'today']) ?>
	 <?= Html::a('Отменить', 'reset',['class' => 'profile-link']) ?>
    </p>
    
    <?php ActiveForm::end();?>
  
</div>

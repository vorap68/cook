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
    <h1>История заказов</h1>
</p>
  
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
	'login',
	'name_dish',
	'price',
	'order_date',
	 
	    ]
	]);
	?>

	<?php //echo $form->field($medias,'status')->textInput(); ?>
	
	
	</p>

	

	
	
	
		
	
	
</div>

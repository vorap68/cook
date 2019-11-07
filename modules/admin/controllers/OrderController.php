<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\OrderToday;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Dish;

/**
 * OrderController implements the CRUD actions for OrderToday model.
 */
class OrderController extends Controller
{
      public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

  
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderToday::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

  
    public function actionCreate()
    {
        $model = new OrderToday();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

  
    public function actionUpdate($id)
    {
	$this->layout = 'employeeLayout';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
	$this->layout = 'employeeLayout';
        $this->findModel($id)->delete();

        return $this->redirect(['/admin/order/employee']);
    }

 
    protected function findModel($id)
    {
        if (($model = OrderToday::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
     public function actionEmployee() {
	$this->layout = 'employeeLayout';
	//debug($model->login);
	
	$medias = new Dish;
	$dataProvider = new ActiveDataProvider([
	    'query' => Dish::find()->where(['status' => '1']),
	]);

	return $this->render('employee', compact('dataProvider', 'medias'));
    }

    /* вызывается  выбраных блюд СОТРУДНИКОМ на сегодн день */

    public function actionEmployeesave() {
	$this->layout = 'employeeLayout';
	$login = Yii::$app->user->identity->login;
	$mass = Yii::$app->request->post();
	$tdish = $mass['Dish']['count'];
	$today = new OrderToday;
	foreach ($tdish as $key => $value) {
	    if (!$value==0){
		
		$medias = Dish::findOne(['id'=>$key]);
		$today->name_dish =$medias['name'].' , '.$dish_today;
		$today->price = $medias['price']*$value + $dish_price;
		$today->login = $login;
		$today->order_date = date('Y-m-d');
		$dish_today = $today->name_dish;
		$dish_price = $today->price;
		//debug(date('d m Y'));
		$today->save();
	    }
	}
	return $this->redirect(['/admin/order/employeetoday']);
    }
    
    public function actionEmployeetoday(){
	$this->layout = 'employeeLayout';
	$login = Yii::$app->user->identity->login;
    $dataProvider  = new ActiveDataProvider([
	     'query'=>OrderToday::find()->where(['login' => $login,'order_date'=>date('Y-m-d')]),
	 ]);
	 return $this->render('employeetoday',['dataProvider'=>$dataProvider,'login'=>$login]);
    }

    public function actionEmployeereset() {
//	$media = Dish::updateAll(['status'=>0]);
//	return $this->redirect('povar');
    }
     public function actionOrders()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderToday::find()->where(['order_date'=>date('Y-m-d')]),
        ]);

        return $this->render('employeetoday', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
}

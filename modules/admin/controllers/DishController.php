<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Dish;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DishController implements the CRUD actions for Dish model.
 */
class DishController extends AppController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
	return [
	    'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		    'delete' => ['POST'],
		],
	    ],
	];
    }

    /**
     * Lists all Dish models.
     * @return mixed
     */
    
    /* вызывается при входе admin*/
    public function actionIndex() {
	$dataProvider = new ActiveDataProvider([
	    'query' => Dish::find(),
	]);

	return $this->render('index', [
		    'dataProvider' => $dataProvider,
	]);
    }

    /* вызывается при входе povar*/
    public function actionPovar() {
	$this->layout = 'povarLayout';
	//$media = Dish::updateAll(['status'=>0]);
	$dataProvider = new ActiveDataProvider([
	    'query' => Dish::find(),
	]);
	//debug($dataProvider);

	return $this->render('povar', [
		    'dataProvider' => $dataProvider,
	]);
    }
    
    /* вызывается для отмены выбраных блюд ПОВАРОМ*/
    public function actionPovarreset() {
	$media = Dish::updateAll(['status'=>0]);
	return $this->redirect('povar');
    }
    
    /* вызывается для записи в БД выбраных блюд ПОВАРОМ на сегодн день*/
    public function actionPovartoday(){
	$mass = Yii::$app->request->post();
	foreach ($mass['selection'] as $key => $value) {
	    $media = Dish::find()->where(['id'=>$value])->one();
	    $media->status = 1;
	    $media->save();
	}
	return $this->redirect('povar');
    }
    
    
    /* вызывается при входе сотрудник*/
    public function actionEmployee(){
	$this->layout = 'povarLayout';
	$medias = new Dish;
	$dataProvider = new ActiveDataProvider([
	    'query' => Dish::find()->where(['status' =>'1']),
	]);
	
	return $this->render('employee',  compact('dataProvider','medias'));
    }
    
    
     /* вызывается  выбраных блюд СОТРУДНИКОМ на сегодн день*/
    public function actionEmployeetoday(){
	$mass = Yii::$app->request->post();
	debug($mass);
    }

     public function actionEmployeereset() {
//	$media = Dish::updateAll(['status'=>0]);
//	return $this->redirect('povar');
    }

    
    public function actionView($id) {
	return $this->render('view', [
		    'model' => $this->findModel($id),
	]);
    }

    public function actionCreate() {
	$model = new Dish();
	//debug($model);
	if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    $model->foto = UploadedFile::getInstance($model, 'foto');
	    if ($model->foto) {
		$model->upload();
	    }
	    Yii::$app->session->setFlash('success', "Блюдо {$model->name} обновлено");
	    return $this->redirect(['view', 'id' => $model->id]);
	}
	return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id) {
	$model = $this->findModel($id);
	//debug($model);

	if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    //debug($_POST);
	    $model->foto = UploadedFile::getInstance($model, 'foto');
	    if ($model->foto) {
		$model->upload();
	    }
	    Yii::$app->session->setFlash('success', "Блюдо {$model->name} обновлено");
	    return $this->redirect(['view', 'id' => $model->id]);
	}

	return $this->render('update', [
		    'model' => $model,
	]);
    }

    public function actionDelete($id) {
	$this->findModel($id)->delete();

	return $this->redirect(['index']);
    }

    protected function findModel($id) {
	if (($model = Dish::findOne($id)) !== null) {
	    return $model;
	}

	throw new NotFoundHttpException('The requested page does not exist.');
    }

}

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
    public function actionIndex() {
	$dataProvider = new ActiveDataProvider([
	    'query' => Dish::find(),
	]);

	return $this->render('index', [
		    'dataProvider' => $dataProvider,
	]);
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

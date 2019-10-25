<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\DefaultController;
use yii\web\Controller;
use yii\helpers\Html;


class AppController extends DefaultController{
  
      public function actionIndex() {
	 return $this->render('index');
	 

    }
}

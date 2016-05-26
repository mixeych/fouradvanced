<?php
namespace frontend\controllers;

use common\models\MyAccountForm;
class MyAccountController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new MyAccountForm();
        return $this->render('index', ['model' => $model]);
    }

}

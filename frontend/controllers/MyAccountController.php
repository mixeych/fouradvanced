<?php
namespace frontend\controllers;
use common\models\MyAccountForm;
use yii\web\Controller;
use yii\filters\AccessControl;

class MyAccountController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $model = new MyAccountForm();
        
        return $this->render('index', ['model' => $model]);
    }

}

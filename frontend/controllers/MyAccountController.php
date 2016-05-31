<?php
namespace frontend\controllers;
use common\models\MyAccountForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;

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
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->saveAccount();
        }
        
        $user = User::findIdentity(\Yii::$app->user->id);
        $userInfo = [];
        $userInfo['username'] = $user->username;
        $birthday = $user->getUserMetaByKey('birthday');
        $birthday = explode('-', $birthday);
        $userInfo['birthday'] = 0;
        $userInfo['birthMonth'] = 0;
        $userInfo['birthYear'] = 0;
        $count = count($birthday);
        if(is_array($birthday)&&$count === 3){
            $userInfo['birthday'] = $birthday[0];
            $userInfo['birthMonth'] = $birthday[1];
            $userInfo['birthYear'] = $birthday[2];
        }
        $userInfo['firstName'] = $user->getUserMetaByKey('firstName');
        $userInfo['secondName'] = $user->getUserMetaByKey('secondName');
        
        return $this->render('index', ['model' => $model, 'user' => $userInfo]);
    }

}

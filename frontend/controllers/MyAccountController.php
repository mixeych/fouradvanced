<?php
namespace frontend\controllers;
use common\models\MyAccountForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;
use yii\helpers\Url;

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
    
    private function addNewAvatar(){
        $mainFolder = \Yii::getAlias('@webroot'). '/images/avatars';
        if(!is_dir($mainFolder)){
            mkdir($mainFolder, 0755);
        }
        $userDir = $mainFolder.'/'.\Yii::$app->user->id;
        if(!is_dir($userDir)){
            mkdir($userDir, 0755);
        }
        $userFiles = scandir($userDir);
        foreach($userFiles as $userFile){
            if($userFile !== '.'&&$userFile !== '..'){
                unlink($userDir.'/'.$userFile);
            }
        }

        $filename = $userDir.'/'.$_FILES[0]['name'];
        
        if(move_uploaded_file($_FILES[0]['tmp_name'], $filename)){
            $user = User::findIdentity(\Yii::$app->user->id);
            $newAvatarUrl = Url::to('/images/avatars/'.\Yii::$app->user->id.'/'.$_FILES[0]['name']);
            $user->updateUserMeta('avatar', $newAvatarUrl);
            echo json_encode(array("success" => true));
        }else{
            echo json_encode(array("success" => false));
        }
        /*
         * @TODO save user meta avatar
         */
        die();
    }
    
    public function actionIndex()
    {
        if(\Yii::$app->request->isAjax){
            $this->addNewAvatar();
        }
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

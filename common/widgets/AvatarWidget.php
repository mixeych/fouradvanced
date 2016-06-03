<?php
namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\User;
use yii\helpers\Url;

class AvatarWidget extends Widget
{
    public function run()
    {
        $user = User::findIdentity(\Yii::$app->user->id);
        if(!$user){
            return false;
        }
        $userAvarar = $user->getUserMetaByKey('avatar');
        if(!$userAvarar){
            $userAvarar = Url::to('@web/images/non-avatar.png');
        }
        return $this->render('avatar', ['avatar' => $userAvarar]);
    }
}


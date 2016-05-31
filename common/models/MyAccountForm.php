<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

class MyAccountForm extends Model
{
    //public $avatar;
    public $day;
    public $mounth;
    public $year;
    public $firstName;
    public $secondName;
    public $username;
    
    public function rules()
    {
        return [
            // rememberMe must be a boolean value
//            ['avatar', 'image', 'minWidth' => 50, 'maxWidth' => 3000,
//                'minHeight' => 50, 'maxHeight' => 3000],
//            ['birthday', 'date', 'format' => 'd-m-Y'],
            [['firstName', 'secondName', 'username'], 'trim'],
            [['firstName', 'secondName'], 'string', 'length' => [1, 100]],
            ['day', 'integer', 'max' => 31, 'min' => 0],
            ['mounth', 'integer', 'max' => 12, 'min' => 0],
            ['year', 'integer', 'max' => date('Y')],
            ['username', 'required'],
            ['username', function ($attribute, $params) {
                $currentUserId = \Yii::$app->user->id;
                
                $sql = "SELECT * FROM user WHERE username = :username AND id <> $currentUserId";
                $user = User::findBySql($sql, [':username' => $this->username])->one();          
                if($user){
                    $this->addError($attribute, 'Такой пользователь существует');
                }
            }]
        ];
    }
    
    public function getMonthsArray()
    {
        for($monthNum = 1; $monthNum <= 12; $monthNum++){
            $months[$monthNum] = date('F', mktime(0, 0, 0, $monthNum, 1));
        }

        return array(0 => 'Month:') + $months;
    }

    public function getDaysArray()
    {
        for($dayNum = 1; $dayNum <= 31; $dayNum++){
            $days[$dayNum] = $dayNum;
        }

        return array(0 => 'Day:') + $days;
    }

    public function getYearsArray()
    {
        $thisYear = date('Y', time());

        for($yearNum = $thisYear; $yearNum >= 1920; $yearNum--){
            $years[$yearNum] = $yearNum;
        }

        return array(0 => 'Year:') + $years;
    }
    
    private function _getbirthday($day, $mounth, $year)
    {
        return $day.'-'.$mounth.'-'.$year;
    }
    
    public function saveAccount()
    {
        if($this->validate()){
            $user = User::findIdentity(Yii::$app->user->id);
            $birthday = $this->_getbirthday($this->day, $this->mounth, $this->year);
            \Yii::trace($birthday);
            \Yii::trace($birthday);
            $user->updateUserMeta('birthday', $birthday);
            $user->updateUserMeta('firstName', $this->firstName);
            $user->updateUserMeta('secondName', $this->secondName);
            $user->username = $this->username;
            $user->save();
            return true;
        }
        return false;
    }
}

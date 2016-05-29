<?php
namespace common\models;

use Yii;
use yii\base\Model;

class MyAccountForm extends Model
{
    public $avatar;
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
            ['avatar', 'image', 'minWidth' => 50, 'maxWidth' => 3000,
                'minHeight' => 50, 'maxHeight' => 3000],
            ['birthday', 'date', 'format' => 'd-m-Y'],
            [['firstName', 'secondName', 'username'], 'trim'],
            [['firstName', 'secondName'], 'string', 'length' => [1, 100]],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['day', 'integer', 'max' => 31, 'min' => 0],
            ['mounth', 'integer', 'max' => 12, 'min' => 0],
            ['year', 'integer', 'min' => 1920, 'max' => date('Y')],
        ];
    }
    
    public function changeAccountInfo()
    {
        if($this->validate()){

        }
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
}

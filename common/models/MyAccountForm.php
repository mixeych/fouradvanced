<?php
namespace common\models;

use Yii;
use yii\base\Model;

class MyAccountForm extends Model
{
    public $avatar;
    public $birthday;
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
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.']
            
        ];
    }
    
}

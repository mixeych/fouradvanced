<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            [['password', 'repassword'], 'required'],
            [['password', 'repassword'], 'string', 'min' => 6],
            
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            ['captcha', 'captcha']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            \Yii::trace('not validate');
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($user->save()){
            $message = "You have new user: $this->username \r\n email: $this->email";
            \Yii::$app->sendMail->sendMail(\Yii::$app->params['adminEmail'], 'admin', 'new user', $message);
           \Yii::$app->session->setFlash('successRegister', 'Регистрация прошла успешно');
            return $user;
        }

        return null;
    }
}

<?php
namespace common\components;
use yii\base\Component;

class SendMail extends Component
{
    const EVENT_NOTIFY = 'notify_admin';
    
    public function sendMail($to , $name='', $subject, $body)
    {
        $this->trigger(self::EVENT_NOTIFY);
//        \Yii::$app->mail->compose()
//        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->params['siteName']])
//        ->setTo([$to => $name])
//        ->setSubject($subject)
//        ->setTextBody($body)
//        ->send();
    }
    
    public function notifyAdmin(){
        
    }
    
    
}

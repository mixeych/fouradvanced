<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Article;
use common\models\User;

/**
 * ContactForm is the model behind the contact form.
 */
class ArticleForm extends Model
{
    public $title;
    public $content;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['title', 'content'], 'required'],
            ['captcha', 'captcha'],
            // email has to be a valid email address
        ];
    }
    
    public function createArticle()
    {
        if($this->validate()){
            $article = new Article();
            $article->title = $this->title;
            $article->content = $this->content;
            $article->updated_at = time();
            $article->created_at = time();
            $article->likes = 0;
            $article->dislikes = 0;
            $article->status = 1;
            $user = User::findIdentity(Yii::$app->user->id);
            $article->author = Yii::$app->user->id;
            if(!$user){
                return false;
            }
            $article->save();
            return true;
        }
        return false;
    }
    
    
}
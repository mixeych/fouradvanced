<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $author
 * @property integer $status
 * @property integer $likes
 * @property integer $dislikes
 * @property integer $created_at
 * @property integer $updated_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author', 'created_at', 'updated_at'], 'required'],
            [['title', 'content'], 'string'],
            [['author', 'status', 'likes', 'dislikes', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'author' => 'Author',
            'status' => 'Status',
            'likes' => 'Likes',
            'dislikes' => 'Dislikes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getActiveArticles()
    {
        return static::find()->where(['status' => 1])->orderBy('created_at')->all();
    }

    /*public function beforeSave($insert)
    {
        Yii::trace('beforeSave');
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {

                $this->updated_at = time();
                $this->created_at = time();
                $this->likes = 0;
                $this->dislikes = 0;
                $this->status = 1;
                $user = findIdentity(Yii::$app->user->id);
                if(!$user){
                    return false;
                }
                $this->author = Yii::$app->user->id;
                Yii::trace('isNewRecord');
            }else{
                Yii::trace('!isNewRecord');
                $this->updated_at = time();
            }
            return true;
        }
        Yii::trace('!parent');
        return false;
    }*/
}

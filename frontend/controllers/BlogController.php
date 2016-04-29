<?php

namespace frontend\controllers;
use frontend\models\ArticleForm;
use Yii;
use common\models\Article;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $articles = Article::getActiveArticles();
        return $this->render('index', ['articles' => $articles]);
    }

    public function actionCreatePost()
    {
        if(Yii::$app->user->isGuest){
            $this->redirect('/blog/');
        }
        $model = new ArticleForm();
        if(Yii::$app->request->post()){

            $model->load(Yii::$app->request->post());
            $model->createArticle();
            $this->redirect('/blog/');
        }
        return $this->render('create-post', ['model' => $model]);
    }

}

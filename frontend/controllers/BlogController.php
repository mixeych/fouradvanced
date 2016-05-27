<?php

namespace frontend\controllers;
use frontend\models\ArticleForm;
use Yii;
use common\models\Article;
use yii\filters\AccessControl;

class BlogController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create-post'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
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
    
    public function actionArticle($id)
    {
        $article = Article::findOne($id);
        Yii::trace('article controller');
        if(!$article){
            Yii::trace('article controller exception');
            throw new NotFoundHttpException;
        }
        Yii::trace('article controller return');
        return $this->render('article', [
            'article' => $article,
        ]);
    }

}

<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Blog';
foreach($articles as $article){?>
    <a href="<?=Url::to(['blog/article', 'id' => $article->id]) ?>"><h3><?=$article->title ?></h3></a>
    <p><?=$article->content ?></p>
<?php
}
?>


<p>
    
</p>

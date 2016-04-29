<?php
use yii\helpers\Html;
$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
var_dump($articles);
foreach($articles as $article){?>
    <h3><?=$article->title ?></h3>
    <p><?=$article->content ?></p>
<?php
}
?>


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

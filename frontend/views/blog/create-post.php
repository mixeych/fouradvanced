<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create post';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

<p>
    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'article-form']); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'content')->textArea(['rows' => 5]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>
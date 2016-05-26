<?php
use \yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'My Info';
use yii\jui\DatePicker;
use yii\helpers\Html; 
?> 
<h1><?= Html::encode($this->title)?></h1>

<p>Информация пользователя</p>
<?php $form = ActiveForm::begin(['id' => 'account-form']); ?>
<?=$form->field($model, 'avatar')->fileInput() ?>
<?= $form->field($model, 'firstName'); ?>
<?= $form->field($model, 'secondName'); ?>
<label for="myaccountform-birthday">Birthday</label>
<?=DatePicker::widget([
    'model' => $model,
    'attribute' => 'birthday',
    'language' => 'ru',
    'dateFormat' => 'dd-MM-YYYY',
    //'id' => 'birthday'
]); ?>
<?=$form->field($model, 'username'); ?>


<?php ActiveForm::end(); ?>




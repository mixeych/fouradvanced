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
<?=$form->field($model, 'day')->dropDownList($model->getDaysArray()) ?>
<?=$form->field($model, 'mounth')->dropDownList($model->getMonthsArray()) ?>
<?=$form->field($model, 'year')->dropDownList($model->getYearsArray()) ?>
<?=$form->field($model, 'username'); ?>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>




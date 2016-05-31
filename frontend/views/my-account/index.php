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
<?= $form->field($model, 'firstName')->textInput(['value' => $user['firstName']]); ?>
<?= $form->field($model, 'secondName')->textInput(['value' => $user['secondName']]); ?>
<label for="myaccountform-birthday">Birthday</label>
<?=$form->field($model, 'day')->dropDownList($model->getDaysArray(), ['options' => [$user['birthday'] => ['Selected' => true]]]) ?>
<?=$form->field($model, 'mounth')->dropDownList($model->getMonthsArray(), ['options' => [$user['birthMonth'] => ['Selected' => true]]]) ?>
<?=$form->field($model, 'year')->dropDownList($model->getYearsArray(), ['options' => [$user['birthYear'] => ['Selected' => true]]]) ?>
<?=$form->field($model, 'username')->textInput(['value' => $user['username']]); ?>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>




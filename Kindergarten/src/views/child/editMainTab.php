<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\jui\DatePicker;

?>

<div class="child-editMainTab">
    <p/>

    <?php $form = ActiveForm::begin([
        'id' => 'child-form',
        'action' => ['child/edit'],
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]); ?>

    <div class="row">
        <?php $lastName = $form->field($model, 'last_name');
        $lastName->inputTemplate = '';
        ?>
        <?= $lastName->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'middle_name') ?>
    </div>

    <?= $form->field($model, 'enrollment_date')->widget(DatePicker::className()) ?>
    <?= $form->field($model, 'outlet_date')->widget(DatePicker::className()) ?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::className()) ?>
    <?= $form->field($model, 'sex')->inline()->radioList(['м' => 'м', 'ж' => 'ж']) ?>

    <?= $form->field($model, 'residential_address') ?>
    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'child-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Relative */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\jui\DatePicker;

?>
<?php Pjax::begin(['id' => 'relative-edit']); ?>
<div class="relative-edit">
    <p/>

    <?php $form = ActiveForm::begin([
        'id' => 'relative-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]); ?>

    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true]); ?>
    <?= $form->field($model, 'first_name'); ?>
    <?= $form->field($model, 'middle_name'); ?>

    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'degree') ?>
    <?= $form->field($model, 'phone') ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'child-button']) ?>

    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end(); ?>

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use yii\jui\DatePicker;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->session->hasFlash('editChild')): ?>

        <p><?= Html::a('Внести изменения', ['child/edit', 'id' => $model->id], ['class' => 'btn btn-primary']); ?></p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'last_name',
                'first_name',
                'middle_name',
                'birthday:date',
                'sex',
                'enrollment_date:date',
                'outlet_date:date',
                'residential_address',
                'address',
                'note',
            ],
        ]);
        ?>

    <?php else: ?>

        <?php $form = ActiveForm::begin([
            'id' => 'child-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ]
        ]);
        //$form->layout = /*'inline';*/ 'horizontal';
        ?>

<!--        <div class="form-group">-->
            <?php $lastName = $form->field($model, 'last_name');
            $lastName->inputTemplate = '';
            ?>
            <?= $lastName->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'first_name') ?>
            <?= $form->field($model, 'middle_name') ?>
<!--        </div>-->

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

    <?php endif; ?>
</div>

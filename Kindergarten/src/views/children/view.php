<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('childFormSubmitted')): ?>

    <?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'child-form']);
                //$form->layout = /*'inline';*/ 'horizontal';
                ?>

                <?php $lastName = $form->field($model, 'last_name');
                $lastName->inputTemplate = null;
                ?>
                <?= $lastName->textInput(['autofocus' => true, 'contenteditable' => false]) ?>
                <?php $firstName = $form->field($model, 'first_name');
                //$firstName->inline();
                ?>
                <?= $firstName ?>
                <?= $form->field($model, 'middle_name') ?>

                <?= $form->field($model, 'enrollment_date') ?>
                <?= $form->field($model, 'outlet_date') ?>

                <?= $form->field($model, 'birthday') ?>
                <?php $sex = $form->field($model, 'sex')->inline();
                $inlineRadioListTemplate = "{label}{input}\n{error}\n{hint}";
                ?>
                <?= $sex->radioList(['м' => 'м', 'ж' => 'ж'], ['template' => $inlineRadioListTemplate]) ?>

                <?= $form->field($model, 'residential_address') ?>
                <?= $form->field($model, 'address') ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'child-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

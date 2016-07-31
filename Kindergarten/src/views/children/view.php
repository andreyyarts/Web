<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->session->hasFlash('editChild')): ?>

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
        <?= Html::a('edit', ['children/edit', 'id' => $model->id]); ?>

    <?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'child-form']);
                //$form->layout = /*'inline';*/ 'horizontal';
                ?>

                <?php $lastName = $form->field($model, 'last_name');
                $lastName->inputTemplate = '';
                ?>
                <?= $lastName->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'first_name') ?>
                <?= $form->field($model, 'middle_name') ?>

                <?= $form->field($model, 'enrollment_date') ?>
                <?= $form->field($model, 'outlet_date') ?>

                <?= $form->field($model, 'birthday')//->widget(\yii\jui\DatePicker::classname() ?>
                <?= $form->field($model, 'sex')->inline()->radioList(['м' => 'м', 'ж' => 'ж']) ?>

                <?= $form->field($model, 'residential_address') ?>
                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'child-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

<?php

/* @var $this yii\web\View */
/* @var $filterModel app\models\ChildSearch */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $dataProvider yii\data\ActiveDataProvider; */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

$this->title = 'Дети';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="children_index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'child-form',
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => "{label}{input}{error}",
            'labelOptions' => ['class' => 'control-label horizontal-margin'],
        ]
    ]); ?>

    <?= $form->field($filterModel, 'is_active')->dropDownList(['' => 'Все', 'Архивные', 'Активные'], [
        'class' => 'form-control input-sm',
        'onchange' => 'this.form.submit()',
    ]); ?>

    <?= $form->field($filterModel, 'sex')->dropDownList(['' => 'Все', 'м' => 'м', 'ж' => 'ж'], [
        'class' => 'form-control input-sm',
        'onchange' => 'this.form.submit()',
    ]); ?>

    <?php ActiveForm::end(); ?>

    <?= Html::a('Добавить', ['child/edit'], ['class' => 'btn btn-primary vertical-margin']); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'full_name',
                'label' => 'ФИО',
                'format' => 'text',
                'enableSorting' => true
            ],
            [
                'attribute' => 'birthday',
                'label' => 'Дата рождения',
                'format' => ['date'],
                'options' => ['width' => '120'],
            ],
            [
                'attribute' => 'sex',
                'label' => 'Пол',
                'format' => 'text',
                'options' => ['width' => '75'],
            ],
            [
                'label' => 'Возраст',
                'options' => ['width' => '80'],
                'value' => function ($data) {
                    return Yii::$app->formatter->asDate('now', 'yy')
                    - Yii::$app->formatter->asDate($data['birthday'], 'yy');
                }
            ],
            [
                'attribute' => 'note',
                'label' => 'Примечание',
                'format' => 'text',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                /*'buttons' => [
                    'edit' => function ($url, $model, $key) {
                        return Html::a('edit', ['child/edit', 'id'=>$key]);
                    },
                ],*/
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

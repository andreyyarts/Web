<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Дети';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="children_index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
        'dataProvider' => $model->getGridData(),
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
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'sex',
                'label' => 'Пол',
                'format' => 'text',
            ],
            [
                //'attribute' => 'birthday',
                'label' => 'Возраст',
                'value' => function ($data) {
                    return  Yii::$app->formatter->asDate('now', 'yy')
                        -  Yii::$app->formatter->asDate($data['birthday'], 'yy');
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
                        return Html::a('edit', ['children/edit', 'id'=>$key]);
                    },
                ],*/
            ],
        ],
        ]); ?>
        <?php Pjax::end(); ?>
    </p>

</div>

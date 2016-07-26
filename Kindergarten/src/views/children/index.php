<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Дети';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="children_index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?php echo GridView::widget([
        'dataProvider' => $model->getGridData(),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'fio',
                'label' => 'ФИО',
                'format' => 'url',
                /*'value' => function ($data) {
                    return $data->fio;
                },*/
                //'enableSorting' => true,
                //'encodeLabel' => true,
                //'value' => 'fio'
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
                'value' => function ($model, $key, $index, $column) {
                    return  Yii::$app->formatter->asDate('now', 'yy') -  Yii::$app->formatter->asDate($model->birthday, 'yy');
                }
            ],
            /*[
                'value' => 'fio',
                'header' => 'ФИО'
            ],*/
        ],
        ]); ?>
    </p>

</div>

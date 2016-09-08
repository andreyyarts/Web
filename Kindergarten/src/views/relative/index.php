<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider; */
/* @var $childId int; */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<div class="relatives_index vertical-margin">

    <?php Pjax::begin(); ?>

    <?= Html::a('Добавить', ['relative/edit', 'childId' => $childId], ['class' => 'btn btn-primary']); ?>

    <p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'degree',
                    'label' => 'Степень родства',
                ],
                [
                    'attribute' => 'full_name',
                    'label' => 'ФИО',
                    'format' => 'text',

                ],
                [
                    'attribute' => 'phone',
                    'label' => 'Телефон',
                ],
                [
                    'attribute' => 'address',
                    'label' => 'Адрес проживания',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{edit} {delete}',
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('edit', $url);
                        },
                    ]
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </p>

</div>

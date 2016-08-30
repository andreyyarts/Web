<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider; */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<div class="relatives_tab vertical-margin">

    <?php Pjax::begin(); ?>

    <?= Html::a('Добавить', ['relative/edit'], ['class' => 'btn btn-primary']); ?>

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
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </p>

</div>

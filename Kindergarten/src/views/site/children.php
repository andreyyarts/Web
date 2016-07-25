<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Дети';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-children">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?php echo GridView::widget([
        'dataProvider' => $model->getGridData(),
        'columns' => [
            [
                'attribute' => 'fio',
                'header' => 'ФИО',
                'format' => 'url',
                //'value' => 'fio'
            ],
            [
                'value' => 'birthday',
                'header' => 'Дата рождения',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'value' => 'sex',
                'header' => 'Пол',
                'format' => 'text',
            ],
            /*[
                'value' => 'fio',
                'header' => 'ФИО'
            ],
            [
                'value' => 'fio',
                'header' => 'ФИО'
            ],*/
        ],
        ]); ?>
    </p>

</div>

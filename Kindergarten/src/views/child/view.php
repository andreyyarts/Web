<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */
/* @var $mainTab string */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\widgets\Pjax;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">

    <?php Pjax::begin(); ?>
        <?= Tabs::widget([
            'items' => [
                [
                    'label' => 'Ребенок',
                    'content' => $mainTab,
                    'active' => true
                ],
                [
                    'label' => 'Родственники',
                    'content' => 'relativies',
                    'options' => ['tag' => 'div'],
                    'headerOptions' => ['class' => 'my-class'],
                ],
            ],
            'options' => ['tag' => 'div'],
            'itemOptions' => ['tag' => 'div'],
            //'headerOptions' => ['class' => 'my-class'],
            'clientOptions' => ['collapsible' => false],
        ]);
        ?>
    <?php Pjax::end(); ?>
</div>

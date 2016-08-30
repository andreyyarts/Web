<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */
/* @var $mainTab string */
/* @var $relativesTab string */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
//use kartik\tabs\TabsX;
use yii\widgets\Pjax;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">

    <?php Pjax::begin(); ?>
    <?= Tabs::widget([
        /*'enableStickyTabs' => true,
        'stickyTabsOptions' => [
            'selectorAttribute' => 'data-target',
            'backToTop' => true,
        ],*/
        'items' => [
            [
                'label' => 'Ребенок',
                'content' => $mainTab,
                'active' => true
            ],
            [
                'label' => 'Родственники',
                'content' => $relativesTab,
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

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */
/* @var $mainTab string */
/* @var $relativesTab string */
/* @var $childId int */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\jui\Tabs;

//use yii\bootstrap\Tabs;
//use kartik\tabs\TabsX;
use yii\widgets\Pjax;

//use yii\helpers\Url;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">
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
                'url' => [Yii::$app->session->hasFlash('editChild') ? '/child/edit-main-tab' : '/child/main-tab', 'id' => $model->id],
                'active' => true
            ],
            [
                'label' => 'Родственники',
                //'content' => 'rel',//$relativesTab,
                'url' => ['/relative/index', 'childId' => $model->id],
                /*'linkOptions' => [
                    //'data-url' => Url::to(['/relative/index'])
                    'data-url' => '/relative/index'
                ]*/
                //'options' => ['tag' => 'div'],
                //'headerOptions' => ['class' => 'my-class'],
            ],
        ],
        'options' => ['class' => 'myClass'],
        //nav nav-tabs
        'itemOptions' => ['class' => 'myClass'],
        'headerOptions' => ['class' => 'myClass'],
        //'clientOptions' => ['collapsible' => false],
    ]);
    ?>
</div>

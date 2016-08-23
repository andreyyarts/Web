<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */
/* @var $mainTab string */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

$this->title = 'Ребенок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-view">
    <?php if (!Yii::$app->session->hasFlash('editChild')): ?>

        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= Html::a('Внести изменения', ['child/edit', 'id' => $model->id], ['class' => 'btn btn-primary']); ?></p>

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

    <?php else: ?>

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
                /*[
                    'label' => 'Tab with custom id',
                    'content' => 'Morbi tincidunt, dui sit amet facilisis feugiat...',
                    'options' => ['id' => 'my-tab'],
                ],
                [
                    'label' => 'Ajax tab',
                    'url' => ['child/editMain'],
                ],*/
            ],
            'options' => ['tag' => 'div'],
            'itemOptions' => ['tag' => 'div'],
            //'headerOptions' => ['class' => 'my-class'],
            'clientOptions' => ['collapsible' => false],
        ]);
        ?>

    <?php endif; ?>
</div>

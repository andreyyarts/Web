<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ChildForm */
/* @var $mainTab string */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

$this->title = 'Ребенок';
?>
<div class="children-viewMainTab vertical-margin">

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
</div>

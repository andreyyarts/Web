<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 26.07.2016
 * Time: 2:01
 */
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ChildrenForm extends Model
{
    function getGridData()
    {
        return new ActiveDataProvider([
            'query' => Child::find()->orderBy('fio'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}
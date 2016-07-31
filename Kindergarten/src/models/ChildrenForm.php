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
use yii\db\Query;

class ChildrenForm extends Model
{
    public function getGridData()
    {
        return new ActiveDataProvider([
            'query' => Child::getQuery(),
            'key' => 'id',
            'pagination' => [
                'pageSize' => 20,
                
            ],
            'sort' => [
                'attributes' => [ 'id', 'full_name', 'birthday', 'sex' ],
            ],
        ]);
    }
}
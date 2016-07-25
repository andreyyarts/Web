<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 26.07.2016
 * Time: 1:45
 */
namespace app\models;

use yii\db\ActiveRecord;

class Child extends ActiveRecord
{
    public static function tableName()
    {
        return 'child';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 26.07.2016
 * Time: 1:45
 */
namespace app\models;

use yii;
use yii\base\Object;
use yii\db\Query;

class Child extends Object
{
    public $id;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $full_name;
    public $sex;
    public $address;
    public $residential_address;
    public $birthday;
    public $enrollment_date;
    public $outlet_date;
    public $note;

    public static function tableName()
    {
        return 'child';
    }

    /**
     * @param $id
     * @return array|bool
     */
    public static function loadById($id)
    {
        $child = self::getQuery()->where(['id' => $id])->limit(1)->one();
        return $child;
    }

    public function save($child)
    {
        $tableName = self::tableName();
        if (isset($child['id'])) {
            return (new Query())->createCommand()->update($tableName, $child, "id = $child[id]")->execute();
        } else {
            (new Query())->createCommand()->insert($tableName, $child)->execute();
            return Yii::$app->db->getLastInsertID();
        }
    }

    public static function getQuery()
    {
        return (new Query())
            ->select(['id',
                'last_name',
                'first_name',
                'middle_name',
                'CONCAT(last_name, \' \', first_name, \' \', middle_name) AS full_name',
                'sex',
                'address',
                'residential_address',
                'birthday',
                'enrollment_date',
                'outlet_date',
                'note'])
            ->from(self::tableName());
    }
}
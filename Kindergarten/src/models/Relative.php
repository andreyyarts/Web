<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 30.08.2016
 * Time: 2:03
 */
namespace app\models;

use yii;
use yii\base\Model;
use yii\db\Query;

class Relative extends Model
{
    public $id;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $child_id;
    public $address;
    public $degree;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'middle_name', 'child_id', 'degree'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'child_id' => 'Ребенок',
            'degree' => 'Степень родства',
            'phone' => 'телефон',
            'address' => 'Адрес прописки',
        ];
    }

    public function loadData($id)
    {
        $childFields = $this->loadById($id);
        $this->setAttributes($childFields);
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function loadById($id)
    {
        $child = $this->getQuery()->where(['id' => $id])->limit(1)->one();
        return $child;
    }

    public function safeAttributes()
    {
        return $this->attributes();
    }

    public function tableName()
    {
        return 'relative';
    }

    public function save()
    {
        $tableName = $this->tableName();

        if (isset($this->id)) {
            return (new Query())->createCommand()->update($tableName, $this, "id = $this->id")->execute();
        } else {
            (new Query())->createCommand()->insert($tableName, $this)->execute();
            return Yii::$app->db->getLastInsertID();
        }
    }

    public function getQuery()
    {
        return (new Query())
            ->select(['id',
                'last_name',
                'first_name',
                'middle_name',
                'CONCAT(last_name, \' \', first_name, \' \', middle_name) AS full_name',
                'child_id',
                'degree',
                'phone',
                'address'
            ])
            ->from($this->tableName());
    }
}
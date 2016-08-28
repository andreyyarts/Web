<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 30.07.2016
 * Time: 16:27
 */
namespace app\models;

use yii;
use yii\base\Model;
use yii\db\Query;

class ChildForm extends Model
{
    public $id;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $sex;
    public $address;
    public $residential_address;
    public $birthday;
    public $enrollment_date;
    public $outlet_date;
    public $note;
    public $is_active = 1;

    public function loadData($id)
    {
        $childFields = Child::loadById($id);
        $this->setAttributes($childFields);
    }
    
    public function safeAttributes()
    {
        return $this->attributes();
    }

    public function fields()
    {
        return [
            'id',
            'lastName' => 'last_name',
            'firstName' => 'first_name',
            'middleName' => 'middle_name',
            'sex',
            'address',
            'residentialAddress' => 'residential_address',
            'birthday',
            'enrollmentDate' => 'enrollment_date',
            'outletDate' => 'outlet_date',
            'note',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'middle_name', 'birthday'], 'required'],
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
            'sex' => 'Пол',
            'birthday' => 'Дата рождения',
            'enrollment_date' => 'Дата зачисления',
            'outlet_date' => 'Дата выпуска',
            'address' => 'Адрес прописки',
            'residential_address' => 'Адрес проживания',
            'note' => 'Примечание',
        ];
    }

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

    /*public function save()
    {
        $child = (new Child())->save($this);
        return $child;
    }*/

    public function save()
    {
        $tableName = self::tableName();
        if (isset($this->id)) {
            return (new Query())->createCommand()->update($tableName, $this, "id = $this->id")->execute();
        } else {
            (new Query())->createCommand()->insert($tableName, $this)->execute();
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
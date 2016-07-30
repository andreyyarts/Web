<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 30.07.2016
 * Time: 16:27
 */
namespace app\models;

use yii\base\Model;

class ChildForm extends Model
{
    public $id;
    public $last_name;
    public $lastName;
    public $first_name;
    public $middle_name;
    public $sex;
    public $address;
    public $residential_address;
    public $birthday;
    public $enrollment_date;
    public $outlet_date;
    public $note;

    /**
     * ChildForm constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $childFields = Child::loadById($id);
        $this->setAttributes($childFields, false);
        $array = $this->toArray();
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
}
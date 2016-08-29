<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 10.08.2016
 * Time: 0:47
 */
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ChildSearch extends Model
{
    public $full_name;
    public $sex;
    public $birthday;
    public $is_active;

    public function rules()
    {
        return [
            [['full_name', 'birthday', 'sex', 'is_active'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = (new ChildForm())->getQuery();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'key' => 'id',
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'attributes' => ['id', 'full_name', 'birthday', 'sex'],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->where('CONCAT(last_name, \' \', first_name, \' \', middle_name) LIKE "%' . $this->full_name . '%" ');
        $query->andFilterWhere(['DATE_FORMAT(birthday, \'%d.%m.%Y\')' => $this->birthday]);
        $query->andFilterWhere(['sex' => $this->sex]);
        $query->andFilterWhere(['is_active' => $this->is_active]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return [
            'sex' => 'Пол',
            'birthday' => 'Дата рождения',
            'full_name' => 'ФИО',
            'is_active' => 'Состояние'
        ];
    }
}
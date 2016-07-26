<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 27.07.2016
 * Time: 0:48
 */
namespace app\controllers;

use app\models\ChildrenForm;
use yii\web\Controller;

class ChildrenController extends Controller
{
    public function actionIndex()
    {
        $model = new ChildrenForm();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 27.07.2016
 * Time: 0:48
 */
namespace app\controllers;

use Yii;
use app\models\ChildForm;
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

    public function actionView()
    {
        $get = Yii::$app->request->get();
        $model = new ChildForm($get['id']);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
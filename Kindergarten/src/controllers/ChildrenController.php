<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 27.07.2016
 * Time: 0:48
 */
namespace app\controllers;

use app\models\Child;
use Yii;
use app\models\ChildForm;
use app\models\ChildrenForm;
use yii\web\Controller;

class ChildrenController extends Controller
{
    const EDIT_CHILD = 'editChild';

    public function actionIndex()
    {
        $model = new ChildrenForm();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView()
    {
        Yii::$app->session->removeFlash(self::EDIT_CHILD);
        $model = new ChildForm();
        $get = Yii::$app->request->get();
        $model->loadData($get['id']);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionEdit()
    {
        $get = Yii::$app->request->get();
        $model = new ChildForm();
        $model->id = $get['id'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->actionView();
        }

        $model->loadData($get['id']);
        Yii::$app->session->setFlash(self::EDIT_CHILD);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
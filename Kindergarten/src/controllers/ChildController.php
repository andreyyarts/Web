<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 27.07.2016
 * Time: 0:48
 */
namespace app\controllers;

use app\models\ChildSearch;
use app\models\Relative;
use yii;
use app\models\ChildForm;
use yii\web\Controller;
use yii\base\Security;

class ChildController extends Controller
{
    const EDIT_CHILD = 'editChild';

    public function actionIndex()
    {
        $filterModel = new ChildSearch();
        $params = Yii::$app->request->post();
        if (empty($params)) {
            $params = Yii::$app->session->get('ChildFilters');
        } else {
            Yii::$app->session->set('ChildFilters', $params);
        }

        $dataProvider = $filterModel->search($params);
        $security = new Security();
        $randomString = $security->generateRandomString();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filterModel' => $filterModel,
            'randomString' => $randomString,
        ]);
    }

    public function actionView($id)
    {
        $model = new ChildForm();
        $childId = Yii::$app->request->get('id', $id);
        $model->loadData($childId);

        /*$relative = new Relative();
        $relativeDataProvider = $relative->search($childId);*/

        $security = new Security();
        $randomString = $security->generateRandomString();
        return $this->render('view', [
            'model' => $model,
            'randomString' => $randomString,
            'mainTab' => $this->renderPartial('viewMainTab', [
                'model' => $model,
                'randomString' => $randomString,
            ]),
            /*'relativesTab' => $this->renderPartial('relativesTab', [
                'dataProvider' => $relativeDataProvider
            ])*/

        ]);
    }

    public function actionEdit()
    {
        $get = Yii::$app->request->get();
        $model = new ChildForm();
        if (isset($get['id'])) {
            $model->id = $get['id'];
        }
        if ($model->load(Yii::$app->request->post()) && ($childId = $model->save()) > 0) {
            Yii::$app->session->removeFlash(self::EDIT_CHILD);
            return $this->actionView($childId);
        }

        if (isset($get['id'])) {
            $model->loadData($get['id']);
        }
        Yii::$app->session->setFlash(self::EDIT_CHILD);
        /*return $this->render('editMainTab', [
            'model' => $model,
        ]);*/

        return $this->render('view', [
            'model' => $model,
            'randomString' => 'edit',
            'mainTab' => $this->renderPartial('editMainTab', [
                'model' => $model,
            ])
        ]);
    }

    public function actionEditMainTab()
    {
        $get = Yii::$app->request->get();
        $model = new ChildForm();
        if (isset($get['id'])) {
            $model->id = $get['id'];
        }
        if ($model->load(Yii::$app->request->post()) && ($childId = $model->save()) > 0) {
            $model->loadData($childId);
            return $this->renderPartial('viewMainTab', [
                'model' => $model,
            ]);
        }

        if (isset($get['id'])) {
            $model->loadData($get['id']);
        }

        return $this->renderPartial('editMainTab', [
            'model' => $model
        ]);
    }

    public function actionMainTab()
    {
        $model = new ChildForm();
        $childId = Yii::$app->request->get('id');
        $model->loadData($childId);

        return $this->renderPartial('viewMainTab', [
            'model' => $model,
        ]);
    }
}
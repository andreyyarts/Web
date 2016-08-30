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

class ChildController extends Controller
{
    const EDIT_CHILD = 'editChild';

    public function actionIndex()
    {
        $filterModel = new ChildSearch();
        $params = Yii::$app->request->post();
        $dataProvider = $filterModel->search($params);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filterModel' => $filterModel,
        ]);
    }

    public function actionView($id)
    {
        //Yii::$app->session->removeFlash(self::EDIT_CHILD);
        $model = new ChildForm();
        $childId = Yii::$app->request->get('id', $id);
        $model->loadData($childId);

        $relative = new Relative();        
        $relativeDataProvider = $relative->search($childId);

        return $this->render('view', [
            'model' => $model,
            'mainTab' => $this->renderPartial('viewMainTab', [
                'model' => $model,
            ]),
            'relativesTab' => $this->renderPartial('relativesTab', [
                'dataProvider' => $relativeDataProvider
            ])

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
            return $this->actionView($childId);
        }

        if (isset($get['id'])) {
            $model->loadData($get['id']);
        }
        //Yii::$app->session->setFlash(self::EDIT_CHILD);
        return $this->render('view', [
            'model' => $model,
            'mainTab' => $this->renderPartial('editMainTab', [
                'model' => $model,
            ])
        ]);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 31.08.2016
 * Time: 22:09
 */
namespace app\controllers;

use app\models\Relative;
use yii;
use yii\web\Controller;

class RelativeController extends Controller
{
    public function actionIndex()
    {
        $childId = Yii::$app->request->get('childId');
        $relative = new Relative();
        $relativeDataProvider = $relative->search($childId);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('index', [
                'dataProvider' => $relativeDataProvider,
                'childId' => $childId
            ]);
        }
        return $this->render('index', [
            'dataProvider' => $relativeDataProvider,
            'childId' => $childId
        ]);
    }

    public function actionEdit()
    {
        $childId = Yii::$app->request->get('childId');
        $id = Yii::$app->request->get('id');
        $model = new Relative();
        if (isset($id)) {
            $model->id = $id;
        }
        if (isset($childId)) {
            $model->child_id = $childId;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save() > 0) {
            return $this->redirect(['child/view', 'id' => $childId]);
        }

        if (isset($id)) {
            $model->loadData($id);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('edit', [
                'model' => $model,
            ]);
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
}
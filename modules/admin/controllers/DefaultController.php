<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ReportSearch;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$searchModel = new ReportSearch();

        $dataProvider = $searchModel->searchGeneralReport(Yii::$app->request->queryParams);

        $period = !empty(Yii::$app->request->queryParams['Report']) && !empty(Yii::$app->request->queryParams['Report']['period']) ? Yii::$app->request->queryParams['Report']['period'] : 0;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'period' => $period
        ]);
    }
}

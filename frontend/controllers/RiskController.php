<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Risk;
use frontend\models\RiskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


//  dropdownlist
use backend\models\Department;
use backend\models\DepartmentGroup;

// Add upload
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * RiskController implements the CRUD actions for Risk model.
 */
class RiskController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Risk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RiskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Risk model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Risk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  
    public function actionCreate()
    {
        $model = new Risk();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = $model->uploadMultiple($model,'image');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }
    /**
     * Updates an existing Risk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->image = $model->uploadMultiple($model,'image');
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }  else {
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Deletes an existing Risk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Risk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Risk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Risk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
// function ดึงแผนก DepDrop 2 ตัวเลือก
      public function actionGetDepart() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $depart_group_id = $parents[0];
                $out = $this->getDepart($depart_group_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    protected function GetDepart($id) {
        $datas = Department::find()->where(['depart_group_id' => $id])->all();
        return $this->MapData($datas, 'depart_id', 'depart_name');
    }
    
    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }
}

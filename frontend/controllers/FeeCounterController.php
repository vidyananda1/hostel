<?php

namespace frontend\controllers;

use Yii;
use app\models\FeeCounter;
use app\models\FeeCounterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Registration;
use app\models\MonthlyFee;
use app\models\Month;

/**
 * FeeCounterController implements the CRUD actions for FeeCounter model.
 */
class FeeCounterController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all FeeCounter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeeCounterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FeeCounter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FeeCounter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new FeeCounter();

        $details = Registration::find()->where(['reg_id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->customer_id = $details->id;
            $model->registration_id = $details->reg_id;
            $model->created_by = Yii::$app->user->id;
            if(!$model->save()){
                print_r($model->errors);die;
                Yii::$app->session->setFlash('danger', 'Failed to Registered !');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('success', 'Registration  Successful !');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'details' => $details,
        ]);
    }

     public function actionFee($bat,$mon)
    {
        $fee = MonthlyFee::find()->where(['batch'=>$bat,'month'=>$mon])->one();
        
        //die($count);
       
        //die($adfee);
        if($fee){
            $adfee = $fee->mon_fee;
            $data = ["adfee"=>$adfee];
            return json_encode($data);
        }else{
            return 0;
        }
    }

    /**
     * Updates an existing FeeCounter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $details = Registration::find()->where(['id'=>$model->customer_id])->one();

       if ($model->load(Yii::$app->request->post()) ) {
            
            $model->updated_by = Yii::$app->user->id;
            if(!$model->save()){
                print_r($model->errors);die;
                Yii::$app->session->setFlash('danger', 'Failed to Update !');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('success', 'Update  Successful !');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('update', [
            'model' => $model,
            'details' => $details,
        ]);
    }

    public function actionPrint($id)
    {
        $model = new FeeCounter();
        $details = FeeCounter::find()->where(["id"=>$id])->one();
        
        // if ($model->load(Yii::$app->request->post()) ) {
        //    // return $this->redirect(['view', 'id' => $model->id]);
        // }
        

        return $this->renderAjax('print', [
            'model' => $model,
            'details'=>$details
        ]);
    }

    /**
     * Deletes an existing FeeCounter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FeeCounter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeeCounter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeeCounter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

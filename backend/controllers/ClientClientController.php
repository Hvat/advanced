<?php

namespace backend\controllers;

use Yii;
use backend\models\ClientClient;
use backend\models\ClientPhone;
use backend\models\ClientClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClientClientController implements the CRUD actions for ClientClient model.
 */
class ClientClientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ClientClient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientClient model.
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
     * Creates a new ClientClient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClientClient();
        $phone = new ClientPhone();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $phone->client_id = $model->id;
            if ($phone->load(Yii::$app->request->post()) && $phone->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'phone' => $phone,
        ]);
    }

    /**
     * Updates an existing ClientClient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $phone = new ClientPhone();

        if ($model->load(Yii::$app->request->post()) && $phone->load(Yii::$app->request->post())) {
            $phone->client_id = $model->id;
            $isValid = $model->validate();
            $isValid = $phone->validate() && $isValid;
            ClientPhone::deleteAll('client_id =' . $model->id);
            if ($isValid) {
                $model->save(false);
                $phone->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'phone' => $phone,
        ]);
    }

    /**
     * Deletes an existing ClientClient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        ClientPhone::deleteAll('client_id =' . $id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClientClient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientClient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientClient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

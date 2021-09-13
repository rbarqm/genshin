<?php

namespace app\controllers;

use Yii;
use app\models\MainCharacter;
use app\models\MainCharacterSearch;
use app\models\MasterGender;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MainCharacterController implements the CRUD actions for MainCharacter model.
 */
class MainCharacterController extends Controller
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
     * Lists all MainCharacter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainCharacterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'character_name',
            [
                'attribute' => 'gender_id',
                'label' => 'Gender',
                'value'     => function ($data) {
                    return $data->gender->gender_name;
                },
            ],
            [
                'attribute' => 'vision_id',
                'label' => 'Vision',
                'value'     => function ($data) {
                    return $data->vision ? $data->vision->vision_name : '- unknown -';
                },
            ],
            [
                'attribute' => 'weapon_id',
                'label' => 'Weapon',
                'value'     => function ($data) {
                    return $data->weapon ? $data->weapon->weapon_type : '- unknown -';

                },
            ],
            [
                'attribute' => 'region_id',
                'label' => 'Region',
                'value'     => function ($data) {
                    return $data->region ? $data->region->region_name : '- unknown -';
                    
                },
            ],
            //'rarity_id',
            //'role_id',
            //'posture_id',

            ['class' => 'yii\grid\ActionColumn'],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'gridColumns' => $gridColumns,
        ]);
    }

    /**
     * Displays a single MainCharacter model.
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
     * Creates a new MainCharacter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $gender = $this->actionGender();
        $model = new MainCharacter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'gender' => $gender
        ]);
    }

    /**
     * Updates an existing MainCharacter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $gender = $this->actionGender();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'gender' => $gender,
        ]);
    }

    /**
     * Deletes an existing MainCharacter model.
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
     * Finds the MainCharacter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainCharacter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainCharacter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGender(){
		$gender = [];
		
		$tabelGender = MasterGender::find()
		->each();
		
		foreach($tabelGender as $row){
			array_push($gender,[
                'id' => $row->id,
				'gender' => $row->gender_name
			]);			
		}
		
		return Json::encode($gender);
	}
}

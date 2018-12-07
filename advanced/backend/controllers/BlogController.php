<?php

namespace backend\controllers;

use bupy7\xml\constructor\XmlConstructor;
use linslin\yii2\curl\Curl;
use Yii;
use common\models\Blog;
use common\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $xml = new XmlConstructor();
        $in = [
            [
                'tag' => 'distributors',
                'attributes' => [
                    'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
                    'xmlns:xsi'=>'http://www.w3.org/2001/XMLSchema-instance',

                ],
                'elements' => [
                    [
                        'tag' => 'publicDistributors',
                    ],
                    ],
                ],
          ];
        $xml_string = $xml->fromArray($in)->toOutput();

        $xml_string ="<distributors><dataByDates/><publicDistributors/><sdecDistributors/><postamatDistributors/></distributors>";
        $url = 'http://www.100sp.ru/api/distributor';
       // $url = 'http://admin.artof.local/blog';
        $token = "5~9kvtVFA79T56nW";

        $curl = new Curl();

        $response = $curl->setOption(CURLOPT_RETURNTRANSFER, 1)->setOption(CURLOPT_POSTFIELDS,http_build_query(array('token' => $token, 'xml' => $xml_string)))->post($url);

//        $ch = curl_init();

        $bodyData = http_build_query(array('token' => $token, 'xml' => $xml_string));
        //$bodyData = "token=".$token."&xml=". $xml_string;

//        $bodyData = json_encode(array(
//            "token"  => $token,
//            "xml" => $xml_string
//        ));


//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POST, true);
////        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false); // требуется с PHP 5.6.0
//        curl_setopt($ch, CURLOPT_POSTFIELDS, htmlspecialchars($bodyData));
//
//        curl_setopt($ch, CURLOPT_HTTPHEADER, [
//            'Content-Type: multipart/form-data; charset=utf-8'
//         //   'Content-Length: '.strlen($bodyData)
//        ]
//        );
//
//        $data = curl_exec($ch);
//
//        if (curl_errno($ch)) {
//            print "Error: " . curl_error($ch);
//        } else {
//            // Show me the result
//            //var_dump($data);
//            curl_close($ch);
//        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'xml' => $response,
            'out' => $bodyData,

        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();

        $model->sort = 50;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php
namespace console\controllers;

use bupy7\xml\constructor\XmlConstructor;
use common\models\Distributors;
use linslin\yii2\curl\Curl;
use Yii;
use yii\console\Controller;

/**
 * Created by PhpStorm.
 * User: absen
 * Date: 10.12.2018
 * Time: 11:50
 */

class SettController extends Controller
{
    protected static function token()
    {
        return "5~9kvtVFA79T56nW";
    }

    public function actionSome()
    {
        echo "kjbhhoik";
    }

       public function actionGetDistributor()
    {
        $xml = new XmlConstructor();
        $in = [
            [
                'tag' => 'distributors',
                'attributes' => [
                    'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
                    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                ],
                'elements' => [
                    [
                        'tag' => 'publicDistributors',
                    ],
                ],
            ],
        ];
        // $xml_string ="<distributors><dataByDates/><publicDistributors/><sdecDistributors/><postamatDistributors/></distributors>";
        $xml_string = $xml->fromArray($in)->toOutput();

        $url = 'http://www.100sp.ru/api/distributor';
        $token = "5~9kvtVFA79T56nW";

        $curl = new Curl();
        echo '111';
        $response = $curl->setOption(CURLOPT_RETURNTRANSFER, 1)->setOption(CURLOPT_POSTFIELDS, http_build_query(array('token' => $token, 'xml' => $xml_string)))->post($url);

        $simple_xml = new \SimpleXMLElement($response);
        $distributors = $simple_xml->publicDistributors->publicDistributor;

        foreach ($distributors as $distr) {
            $model = Distributors::find()->where(['code' => $distr['code']])->one();
              if (! $model){$model = new Distributors();};
            $arr_distr = @json_decode(@json_encode($distr),1);

             // echo var_dump($model->attributes);
              foreach($arr_distr as $key=>$value){if(is_string($value)&&array_key_exists($key,$model->attributes)) {$model->$key=$value;
              //    echo 'key '.$key; echo 'value '.$value; echo 'm-key '.$model->$key;
              }};
            echo $model->name."\r\n";
              $model->save();


        }

    }
}
<?php namespace App\Http\Controllers;
mb_internal_encoding("UTF-8");

//use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
//use App\Services\MongoService;
use DB;
use Illuminate\Support\Facades\Redis;
use Monolog\Logger;

class getDataController extends Controller
{

    //**************************************************************
    //座標から駐車場情報取得
    //@param:lat,lng 現在地の座標
    //@param:radius 検索範囲
    //@return 駐車場情報
    //**************************************************************
    public function getParkingData()
    {
        echo 'こんにちは';
            Logger::DEBUG("getParkingData()");

        //半径1kmあたりの座標
        //$latScale = 0.009027;
        //$lngScale = 0.011111;

        $distance = (float)$_GET['radius'] * 0.000157;

        //mongodbからデータ取得
        //$selectParData = DB::collection("parking_space")->get();
        $selectParData = DB::getMongoDB()->Command(
            array(
                //'geoNear' => 'parking_space',
                'geoNear' => 'location',
                'near' => array((float)$_GET['lng'], (float)$_GET['lat']),
                'spherical' => 'true',
                'maxDistance' => $distance
            )
        );
        //Redisアクセス
        $redisData = Redis::connection();

        foreach ($selectParData['results'] as $id => $obj) {
            $key_Id = "parking_data_" . $obj['obj']['parking_space_id'];
            $redisList = $redisData->get($key_Id);
            $getredisList = json_decode($redisList, true, JSON_UNESCAPED_UNICODE);
            $getDataList[] = array
            (
                'parking_space_id' => $obj['obj']['parking_space_id'],
                'lat' => $obj['obj']['lnglat'][0],
                'lng' => $obj['obj']['lnglat'][1],
                'name' => $getredisList[0]['parking_name'],
                'prefecture' => $getredisList[0]['prefecture'],
                'city' => $getredisList[0]['city'],
                'address' => $getredisList[0]['address'],
                'utilization_start_time' => $getredisList[0]['utilization_start_time'],
                'utilization_end_time' => $getredisList[0]['utilization_end_time']
            );
        }
        $getDataList = array('results' => $getDataList);

        //var_dump($latMin);
        return json_encode($getDataList, true);
        //return "aaa";
    }

    //**************************************************************
    //駐車場IDから駐車場情報取得
    //@param:parkingId 駐車場ID
    //@return 駐車場情報
    //**************************************************************
    public function getParkingDetail()
    {
        //Redisアクセス
        $redisData = Redis::connection();

        $key_Id = "parking_data_" . $_GET['parkingId'];

        $redisList = $redisData->get($key_Id);
        $getRedisList = json_decode($redisList, true, JSON_UNESCAPED_UNICODE);

        $getDataList[] = array
        (
            'parking_space_id' => $getRedisList[0]['parking_space_id'],
            'parkingname' => $getRedisList[0]['parking_name'],
            'prefecture' => $getRedisList[0]['prefecture'],
            'city' => $getRedisList[0]['city'],
            'address' => $getRedisList[0]['address'],
            'utilization_start_time' => $getRedisList[0]['utilization_start_time'],
            'utilization_end_time' => $getRedisList[0]['utilization_end_time'],
            'parking_type' => $getRedisList[0]['parking_type']
        );
        $getDataList = array('results' => $getDataList);

        //var_dump($getRedisList[0]['parking_space_id']);
        return json_encode($getDataList, JSON_UNESCAPED_UNICODE);
        //return $getRedisList;
    }

    //**************************************************************
    //車室タイプ取得
    //@param:parkingId 駐車場ID
    //@return 車室タイプ情報
    //**************************************************************
    public function getVehicleSpaceType()
    {
        //Redisアクセス
        $redisData = Redis::connection();

        $key_Id = "vehicle_space_type_id_" . $_GET['parkingId'];

        //フィールド取得
        $fieldCount = $redisData->hlen($key_Id);

        for ($count = 1; $count <= $fieldCount; $count++) {
            $redisList = $redisData->hget($key_Id, $count);
            $getRedisList = json_decode($redisList, true, JSON_UNESCAPED_UNICODE);

            $getDataList[] = array
            (
                'parking_type' => $getRedisList[0]['parking_type']
            );
        }

        $getDataList = array('results' => $getDataList);

        //var_dump($getRedisList[0]['parking_space_id']);
        return json_encode($getDataList, JSON_UNESCAPED_UNICODE);
        //return $getRedisList;
    }

    //**************************************************************
    //アピール文取得
    //@param:parkingId 駐車場ID
    //@return アピール情報
    //**************************************************************
    public function getAppealData()
    {
        //Redisアクセス
        $redisData = Redis::connection();

        $key_Id = "appeal_" . $_GET['parkingId'];

        //フィールド取得
        $fieldCount = $redisData->hlen($key_Id);

        if ($fieldCount > 0) {
            for ($count = 1; $count <= $fieldCount; $count++) {
                $redisList = $redisData->hget($key_Id, $count);
                $getRedisList = json_decode($redisList, true, JSON_UNESCAPED_UNICODE);

                $getDataList[] = array
                (
                    'title_id' => $getRedisList[0]['title_id'],
                    'title_text' => $getRedisList[0]['title_text']
                );
            }
        } else {
            $getDataList[] = array
            (
                'title_id' => "null",
                'title_text' => "なし"
            );
        }

        $getDataList = array('results' => $getDataList);

        //var_dump($getDataList['results']);
        return json_encode($getDataList, JSON_UNESCAPED_UNICODE);
        //return $getRedisList;
    }

    //**************************************************************
    //駐車場IDから貸出情報取得
    //@param:parkingId 駐車場ID
    //@return 駐車場情報
    //**************************************************************
    public function getParkingSetting()
    {
        //Redisアクセス
        $redisData = Redis::connection();

        $key_Id = "parking_setting_" . $_GET['parkingId'];

        $redisList = $redisData->get($key_Id);
        $getRedisList = json_decode($redisList, true, JSON_UNESCAPED_UNICODE);

        $getDataList[] = array
        (
            'accept_period' => $getRedisList[0]['accept_period'],
        );
        $getDataList = array('results' => $getDataList);

        //var_dump($getRedisList[0]['parking_space_id']);
        return json_encode($getDataList, JSON_UNESCAPED_UNICODE);
        //return $getRedisList;
    }

    //**************************************************************
    //車両タイプ取得
    //@return 車両タイプ
    //**************************************************************
    public function getVehicleType()
    {
        //MySql接続
        $mysql = mysql_connect('localhost:3306', 'developer', 'dev01');

        if (!$mysql) {
            echo "MySQL接続失敗";
        }

        //DB接続
        $db_selected = mysql_select_db('coinpark', $mysql);

        if (!$db_selected) {
            echo "DB接続失敗";
        }

        //文字タイプ指定
        mysql_set_charset('utf8');

        //SQL作成
        $selectSql = 'select vehicle_type,name from vehicle_type';

        //実行
        $res = mysql_query($selectSql);

        if (!$res) {
            echo "SQL失敗";
        }

        while ($row = mysql_fetch_assoc($res)) {

            $getDataList[] = array
            (
                'vehicle_type' => $row['vehicle_type'],
                'name' => $row['name']
            );
        }

        //接続を切断
        mysql_close($mysql);

        $getDataList = array('results' => $getDataList);

        return json_encode($getDataList, true);
    }

}

?>
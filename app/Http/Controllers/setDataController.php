<?php namespace App\Http\Controllers;
mb_internal_encoding("UTF-8");

//use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\Services\MongoService;
use DB;
use Illuminate\Support\Facades\Redis;

class setDataController extends Controller
{

	//Redis登録用(駐車場)
	public function setParkingData()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$setData[] = array
		(
			'parking_space_id' => '2',
			'parking_name' => '赤坂見附駅駐車場',
			'prefecture' => '東京都',
			'city' => '港区',
			'address' => '赤坂見附',
			'utilization_start_time' => '8:00',
			'utilization_end_time' => '22:00',
			'parking_type' => '2'
		);
		$setJsonData = json_encode($setData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->Set('parking_data_2', $setJsonData);
	
	}
	
	//Redis登録用(貸出情報)
	public function setParkingSetting()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$setData[] = array
		(
			'parking_space_id' => '1',
			'accept_period' => '21'
		);
		$setJsonData = json_encode($setData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->Set('parking_setting_1', $setJsonData);
	
	}
	
	//Redis登録用(車室)
	public function setVehicleSpace()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$car = array('2','3','4');
		
		$setData[] = array
		(
			'parking_space_id' => '1',
			'vehicle_space_no' => '1',
			'vehicle_space_name' => '車室1',
			'roof_flg' => '0',
			'continuous use_flg' => '0',
			'vehicle_width' => '3',
			'vehicle_height' => 'null',
			'vehicle_length' => '5',
			'vehicle_weight' => 'null',
			'vehicle_low' => 'null',
			'vehicle_tire' => 'null',
			'vehicle_name' => $car,
			'standard_price' => '1500',
			'hourly_flg' => '0'
		);
		$setJsonData = json_encode($setData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('vehicle_space_1','1', $setJsonData);
	
	}
	
	//Redis登録用(車室タイプ)
	public function setVehicleSpaceType()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$setData1[] = array
		(
			'vehicle_space_type_id' => '1',
			'parking_space_id' => '1',
			'name' => '車室タイプ1',
			'parking_type' => '2',
			'description' => ''
		);
		$setJsonData = json_encode($setData1,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('vehicle_space_type_id_1','1', $setJsonData);
		
		$setData2[] = array
		(
			'vehicle_space_type_id' => '2',
			'parking_space_id' => '2',
			'name' => '車室タイプ1',
			'parking_type' => '2',
			'description' => ''
		);
		$setJsonData = json_encode($setData2,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('vehicle_space_type_id_2','1', $setJsonData);
		
		$setData3[] = array
		(
			'vehicle_space_type_id' => '3',
			'parking_space_id' => '2',
			'name' => '車室タイプ2',
			'parking_type' => '1',
			'description' => ''
		);
		$setJsonData = json_encode($setData3,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('vehicle_space_type_id_2','2', $setJsonData);
	
	}
	
	//Redis登録用(コメント)
	public function setComment()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$setData[] = array
		(
			'parking_space_id' => '1',
			'title_id' => '2',
			'title_text' => '低価格！'
		);
		$setJsonData = json_encode($setData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('appeal_1','2', $setJsonData);
	
	}
	
	//Redis登録用(補足説明)
	public function setDescription()
	{
		//Redisアクセス
		$redisData = Redis::connection();
		
		$setData[] = array
		(
			'parking_space_id' => '1',
			'description_id' => '1',
			'description_type' => '3',
			'title_text' => '夜はお静かに'
		);
		$setJsonData = json_encode($setData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		//$redisData->delete('00000001');
		$redisData->hSet('parking_description_1','1', $setJsonData);
	
	}
}
?>
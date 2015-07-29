<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Log;

class TestController extends Controller 
{

	public function TestMongo()
	{
//		$data = array(
//			'lat'	=>	(float)$_GET['lat'],
//			'lng' =>	(float)$_GET['lng'],
//			'dis'	=>	(float)$_GET['radius']
//		);
		$mongo = app('\App\Services\mongo_test') -> execute();
		return $mongo;
	}

	public function TestRedis()
	{
		$redis = app('\App\Services\Redis');
		return $redis -> executeBar();
	}
	
	public function testAll()
	{
		//$data = array(
		//	'lat'	=>	(float)$_GET['lat'],
		//	'lng' =>	(float)$_GET['lng'],
		//	'dis'	=>	(float)$_GET['radius']
		//);
		//$mongodata = app('\App\Services\Mongo',[$data]) -> execute();
		//$alldata = app('\App\Services\Redis',[$mongodata['results']]) -> execute();
		//return view('mapsample') -> with('data', $alldata);
		//$alldata = json_encode($alldata,true);//,true | JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

		$member= 1;
		//$member = DB::connection('coinpark')->select('select * from member');
		//->where('mail_address', '=', 'a-ueda@c4bi.co.jp')
		//->where('password', '=', 'password')
		//->pluck('last_name');

		$con = DB::connection('mysql');

        $members = $con->table('member')->where('mail_address','a-ueda@c4bi.co.jp')->pluck('date_of_birth');
		Log::debug($members);

		$con->disconnect();


		Log::debug($_SERVER['REQUEST_URI']);
		Log::debug(PHP_URL_PATH);
		Log::debug(__DIR__);
		Log::debug(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));



		return '"result":"' . $members . '"';


		//return view('mapsample') -> with('data', $alldata);
	}
}

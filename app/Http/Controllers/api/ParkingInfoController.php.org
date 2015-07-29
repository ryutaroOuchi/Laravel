<?php namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redis;
use DB;
use Member;

class RedisController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
//	public function __construct()
//	{
//		$this->middleware('guest');
//	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
//	public function index()
//	{
//		return view('welcome');
//	}

	/**
	 * ’“ŽÔêƒŠƒXƒg‚ÌKey‚©‚çRedis‚ÌValue‚ðŽæ“¾
	 * 
	 * @return results JSONŒ`Ž®
	 */
	public function redisTest()
	{
		//$parkingSpaceIdList = array('1' => 'AAA', '2' => 'BBB', '3' => 'CCC');
		$parkingSpaceIdList = $_GET['ids'];
		$redis = Redis::connection();
		$results = '';//$redis->mget($parkingSpaceIdList)->;
//		$distance = '';
		foreach ($parkingSpaceIdList as $parkingSpaceId) {
			$results = $results . $redis->get($parkingSpaceId);
//			$results[] = $redis->get($parkingSpaceId)."distance";
		}
//		$data =json_encode($results);
		return $results;
//		return $parkingSpaceIdList;
//		return $_GET['id'];
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function mysqlTest()
	{
		//$results = DB::select('select * from member');
		$member= 1;
		$member = DB::table('member')
		->where('mail_address', '=', 'a-ueda@c4bi.co.jp')
		->where('password', '=', 'password')
		->pluck('last_name');
		
		//return DB::select('select * from member');
		return $member;
	}
	public function map()
	{
		return view('mapsample');
	}
}

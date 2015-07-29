<?php namespace App\Http\Controllers;
//use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Support\Facades\Redis;
//use Jenssegers\Mongodb\MongodbServiceProvider as MongoClient;
use DB;
use App\Services\MongoService;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use App\Find;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
//class MongoDBController extends Eloquent {
class MongoDBController extends Controller {
// app/config/database.phpのdefaultsの設定を
    // 変更していないので、ここで接続を明記する
    protected $connection = 'mongodb';
    // Laravelは特に指定しない限り、クラス名の
    // 小文字で複数形にしたもの使うので、Meshの
    // 複数形をmeshsにされるかもという懸念があり、
    // 明示しておきます。
    protected $collection = 'coinpark';

//	protected $dis;

	public function index()
	{
		return 'abc';
	}

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function mongoGet()
	{
//		$dis = $request->input('dis');
//		return $dis;
	}

	public function mongoTest()//$lat,$lng,$rad)
	{
		$dataIN = array(
			'lat'	=>	(float)$_GET['lat'],
			'lng'	=>	(float)$_GET['lng'],
			'radius'=>	(float)$_GET['radius']
		);
		$data = new MongoData->mongoGet($dataIN);
//		$data = $app->make('MongoData', $dataIN);
//		$data = App::getFacadeAccessor()->make('MongoData', $dataIN);
		return $data;
//		mb_language("uni");
//		mb_internal_encoding("utf-8"); //蜀�驛ｨ譁�蟄励さ繝ｼ繝峨ｒ螟画峩
//		mb_http_input("auto");
//		mb_http_output("utf-8");
//		$dis = \Request::all();
//$client = DB::getMongoClient();
/*		$dis = 0;
		$data = 0;
		if($request->input('dis')){
		$dis = $request->input('dis');
		$db = DB::getMongoDB();
//return "$db";
		// 接続xx
		//$m = new MongoClient();

		// データベースの選択
		//$db = $m->coinpark;

		// コレクション (リレーショナルデータベースのテーブルみたいなもの) の選択
		//$collection = $db->parking_space;

		// レコードの追加
		//$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
		//$collection->insert($document);

		// 構造が異なる別のレコードの追加
		//$document = array( "title" => "XKCD", "online" => true );
		//$collection->insert($document);

		// コレクション内の全件の検索
		//$cursor = $collection->find();


		$range = $db->Command(
			array(
				'geoNear'	  => 'parking_space',
				'near'   	  => [
					'type'			=> 'point',
					'coordinates'	=> [ (float)$_GET['lng'] , (float)$_GET['lat'] ]//[139.701238, 35.658871]
				],
				'spherical'	  => 'true',
				'maxDistance' => (float)$_GET['radius']
			)
		);
//		$data = $range['results']
		foreach ( $range['results'] as $mongo_results )
		{
			$resmongo[]=["id"=>$mongo_results['obj']['parking_space_id'],"dis" => $mongo_results['dis']];
		}
		$redis = Redis::connection();
//		$results = '';
		foreach ($resmongo as $list) 
		{
			$redisList = $redis->get($list['id']);
			$results[] = array( 'detail' => json_decode($redisList), 'distance' => $list['dis']);
		}
		header('Content-type: application/json');
		$data =json_encode($results,JSON_FORCE_OBJECT);
		return $data;
		// 結果の反復処理
/*		foreach ($resmongo as $id) {
			$results = $results . $redis->get($id).'distance';
		}
		$data =json_encode($results);
/*		foreach ($cursor as $document) {
		    echo $document["title"] . "\n";
		}
*/
//		$users = DB::collection('yamanotesen')->get();
		//$users =  DB::collection('parking_space')->find({'parking_space_id' : '1'});
//		for($i=0; $i<count($users); ++$i ){
//			$data[$i] = $users[$i]['loc'];
//		}
//		$data = ['aaa','bbb','ccc'];
//		return $results;
//		return $range;
//		return $results;
//		return view('mongo',compact('data'));
		
		//return view('mongo',$data);
//		}else{
//			return view('mongo');
//		}
	}
}

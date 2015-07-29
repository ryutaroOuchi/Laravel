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
// app/config/database.php��defaults�̐ݒ��
    // �ύX���Ă��Ȃ��̂ŁA�����Őڑ��𖾋L����
    protected $connection = 'mongodb';
    // Laravel�͓��Ɏw�肵�Ȃ�����A�N���X����
    // �������ŕ����`�ɂ������̎g���̂ŁAMesh��
    // �����`��meshs�ɂ���邩���Ƃ������O������A
    // �������Ă����܂��B
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
//		mb_internal_encoding("utf-8"); //内部文字コードを変更
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
		// �ڑ�xx
		//$m = new MongoClient();

		// �f�[�^�x�[�X�̑I��
		//$db = $m->coinpark;

		// �R���N�V���� (�����[�V���i���f�[�^�x�[�X�̃e�[�u���݂����Ȃ���) �̑I��
		//$collection = $db->parking_space;

		// ���R�[�h�̒ǉ�
		//$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
		//$collection->insert($document);

		// �\�����قȂ�ʂ̃��R�[�h�̒ǉ�
		//$document = array( "title" => "XKCD", "online" => true );
		//$collection->insert($document);

		// �R���N�V�������̑S���̌���
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
		// ���ʂ̔�������
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

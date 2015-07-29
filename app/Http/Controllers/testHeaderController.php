<?php namespace App\Http\Controllers;
mb_internal_encoding("UTF-8");

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MongoService;
use DB;
use Illuminate\Support\Facades\Redis;

class testHeaderController extends Controller
{

	public $con = 'mongodb';
	public $db = 'coinpark';
	
	public function testHeader()
	{
		return view('test_header');
	}

	public function testHeader2()
	{
		return view('test_header2');
	}

	public function selectTest()
	{
		//$strAddress = $_GET['strAddress'];
		//$vehicleType = $_GET['vehicleType'];
		
		$selectData = [];
		$selectData['strAddress'] = $_GET['strAddress'];
		$selectData['vehicleType'] = $_GET['vehicleType'];
	
		return view('test',$selectData);
	}
	
	public function detailsTest()
	{
		return view('details_test') -> with('strAddress', $_GET['parkingId']);
	}
}
?>

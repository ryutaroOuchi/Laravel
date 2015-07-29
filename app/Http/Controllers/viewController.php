<?php namespace App\Http\Controllers;
mb_internal_encoding("UTF-8");

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MongoService;
use DB;
use Illuminate\Support\Facades\Redis;

class viewController extends Controller
{
	//**************************************************************
	//トップ画面
	//**************************************************************
	public function viewTop()
	{
		return view('top');
	}
	
	//**************************************************************
	//ログイン画面
	//**************************************************************
	public function viewLogin()
	{
		return view('login');
	}
	
	//**************************************************************
	//検索画面
	//**************************************************************
	public function viewSearch()
	{
		return view('search_display');
	}
	
	//**************************************************************
	//駐車場詳細画面
	//**************************************************************
	public function viewDetails()
	{
		return view('parking_details');
	}
	
	//**************************************************************
	//予約確認画面
	//**************************************************************
	public function viewReservation()
	{
		return view('reservation');
	}
	
	//**************************************************************
	//予約確定画面
	//**************************************************************	
	public function viewCompletion()
	{
		return view('reservation_completion');
	}
}
?>

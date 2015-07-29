<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*class Bar
{

	public function execute()
	{
		echo 'Bar executed!!';
	}
}

class Foo
{
	
	private $bar;

	public function __construct(Bar $bar)
	{
		$this->bar = $bar;
	}

	public function executeBar()
	{
		$this->bar->execute();
	}
}
*/
Route::get('/', 'WelcomeController@index');
Route::get('apiget', 'APIController@TestAPI');

Route::get('mongo', 'MongoDBController@mongoTest');

Route::get('testmongo', 'TestController@testMongo');
Route::get('testredis', 'TestController@testRedis');
Route::get('testall', 'TestController@testAll');

/********************* tanaka *************************************/

Route::get('tanaka','TanakaController@tanakatest');
Route::get('tanaka2','TanakaController@tanakatest2');

/*****************************************************************/

/********************* anzai *************************************/
Route::get('top', 'viewController@viewTop');
Route::get('login', 'viewController@viewLogin');
Route::get('search', 'viewController@viewSearch');
Route::get('details', 'viewController@viewDetails');
Route::get('reservation', 'viewController@viewReservation');
Route::get('completion', 'viewController@viewCompletion');

Route::get('getVehicleType', 'getDataController@getVehicleType');
Route::get('getParkingData', 'getDataController@getParkingData');
Route::get('getParkingDetail', 'getDataController@getParkingDetail');
Route::get('getParkingSetting', 'getDataController@getParkingSetting');
Route::get('getAppealData', 'getDataController@getAppealData');
Route::get('getVehicleSpaceType', 'getDataController@getVehicleSpaceType');

Route::get('setParkingData', 'setDataController@setParkingData');
Route::get('setParkingSetting', 'setDataController@setParkingSetting');
Route::get('setVehicleSpace', 'setDataController@setVehicleSpace');
Route::get('setComment', 'setDataController@setComment');
Route::get('setDescription', 'setDataController@setDescription');
Route::get('setVehicleSpaceType', 'setDataController@setVehicleSpaceType');
/*****************************************************************/
// koike
Route::get('testheader', 'testHeaderController@testHeader');
Route::get('testheader2', 'testHeaderController@testHeader2');
// koike
//Route::get('test/{message?}',function(app\Services\testService $message){
	//$sender = new Send_One();
//	$sender = App::make('sender');
//	return $sender -> send($message);
//});

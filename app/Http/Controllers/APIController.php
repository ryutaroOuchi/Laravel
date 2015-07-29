<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller 
{

	public function TestAPI()
	{
		return view('api');
	}

}

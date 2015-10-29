<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Question;
use App\Feedback;
//pivotnya sek

class NonDeptController extends Controller {

	public function __construct(){
		if(Auth::id()!=1)
			return redirect('/');

	}


	public function index()
	{
		//--wajib
		$this->data['role']=2;

		return view('pages.nondept.dashboard',$this->data);
	}



}

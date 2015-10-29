<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Department;
use App\Position;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function check__(){
		if(Auth::id() != 1) {
			return redirect('/');
		}
	}

	public function index()
	{
		//wajib
		$this->check__();
		$this->data['role'] = 1;
		//--wajib

		$this->data['user'] = User::where('deleted_at', null)->count();
		$this->data['user_disabled'] = User::where('deleted_at', !null)->count();
		$this->data['department'] = Department::where('enabled', 1)->count();
		$this->data['position'] = Position::where('enabled', 1)->count();

		return view('pages.admin.dashboard',$this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//wajib
		$this->check__();
		$this->data['role'] = 1;
		//--wajib
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
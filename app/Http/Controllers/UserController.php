<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Auth;
use Request;
use App\User;
use App\Position;
use App\Department;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//wajib
		$this->data['role'] = 1;
		//--wajib

		if (Request::isMethod('get')) 
        {
        	$this->data['items'] = User::get();
            return view('pages.user.index', $this->data);
        }        
        elseif (Request::isMethod('post')) 
        {
        	
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//wajib
		
		$this->data['role'] = 1;
		//--wajib

		if (Request::isMethod('get')) 
        {
        	$this->data['positions'] = Position::where('enabled',1)->get();
        	$this->data['departments'] = Department::where('enabled',1)->get();
            return view('pages.user.create', $this->data);
        }        
        elseif (Request::isMethod('post')) 
        {
        	$data = Input::all();
        	User::create([
				'name' => $data['name'],
				'username' => $data['username'],
				'password' => bcrypt($data['username']),
				'deptid' => $data['deptid'],
				'positionid' => $data['positionid'],
			]);
            return redirect('user');
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		//wajib
        $this->data['role'] = 1;
        //--wajib

        $this->data['item'] = User::find($id);
        if($this->data['item'])
            return view('pages.user.detail', $this->data);
        else 
            return redirect('user');
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
		//wajib
        $this->data['role'] = 1;
        //--wajib

        if (Request::isMethod('get')) 
        {
            $this->data['positions'] = Position::where('enabled',1)->get();
        	$this->data['departments'] = Department::where('enabled',1)->get();
            $this->data['item'] = User::find($id);
            if($this->data['item'])
                return view('pages.user.update', $this->data);
            else 
                return redirect('user');
        }        
        elseif (Request::isMethod('post')) 
        {
            $user = User::find($id);
            $user->update(Input::all());
            return redirect('user/detail/'.$id);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//wajib
		$this->data['role'] = 1;
		//--wajib

		$department = User::find($id);
		$department->delete();
		return redirect('user');
	}

}

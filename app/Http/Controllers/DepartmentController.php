<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Input;
use Request;
use App\Department;

class DepartmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		if (Request::isMethod('get')) 
        {
        	$this->data['items'] = Department::get();
            return view('pages.department.index', $this->data);
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

		if (Request::isMethod('get')) 
        {
        	$this->data['items'] = Department::get();
            return view('pages.department.create', $this->data);
        }        
        elseif (Request::isMethod('post')) 
        {
        	$department = Department::create(Input::all());
            return redirect('department');
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function detail($id)
	{

		$this->data['item'] = Department::find($id);
		if($this->data['item'])
			return view('pages.department.detail', $this->data);
		else 
			return redirect('department');
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

		if (Request::isMethod('get')) 
        {
        	$this->data['items'] = Department::get();
        	$this->data['lala'] = Department::find($id);
			if($this->data['lala'])
				return view('pages.department.update', $this->data);
			else 
				return redirect('department');
        }        
        elseif (Request::isMethod('post')) 
        {
        	$department = Department::find($id);
        	$department->update(Input::all());
            return redirect('department/detail/'.$id);
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

		$department = Department::find($id);
		$department->enabled = 0;
		$department->delete();
		return redirect('department');
	}

}

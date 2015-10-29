<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Auth;
use Request;
use App\Position;

class PositionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		if (Request::isMethod('get')) 
        {
        	$this->data['items'] = Position::get();
            return view('pages.position.index', $this->data);
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
        	$this->data['items'] = Position::get();
            return view('pages.position.create', $this->data);
        }        
        elseif (Request::isMethod('post')) 
        {
        	$position = Position::create(Input::all());
            return redirect('position');
        }
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
	public function detail($id)
	{

        $this->data['item'] = Position::find($id);
        if($this->data['item'])
            return view('pages.position.detail', $this->data);
        else 
            return redirect('position');
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
            $this->data['items'] = Position::get();
            $this->data['lala'] = Position::find($id);
            if($this->data['lala'])
                return view('pages.position.update', $this->data);
            else 
                return redirect('position');
        }        
        elseif (Request::isMethod('post')) 
        {
            $position = Position::find($id);
            $position->update(Input::all());
            return redirect('position/detail/'.$id);
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

		$department = Position::find($id);
		$department->enabled = 0;
		$department->delete();
		return redirect('position');
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Input;
use App\Event;

class EventController extends Controller {

	public function index()
	{
    $this->data['items'] = Event::orderBy('created_at','desc')->get();
		return view('pages.event.index', $this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if ($request->isMethod('get'))
				{
          $this->data['items'] = Event::orderBy('created_at','desc')->get();
						return view('pages.event.create', $this->data);
				}
				elseif ($request->isMethod('post'))
				{
					// TODO
					$variabel = Event::create($request->all());
						return redirect('event');
		}
	}

	public function delete($id)
	{

		if($department = Event::find($id)){
				$department->enabled = 0;
				$department->delete();
				return redirect('event');
		}
		else
		{
			return redirect('event')->withErrors($department);
		}
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
	public function update(Request $request,$id)
	{
		if ($request->isMethod('get'))
        {
        	$this->data['items'] = Event::orderBy('created_at','asc')->get();
        	$this->data['lala'] = Event::find($id);
			if($this->data['lala'])
				return view('pages.event.update', $this->data);
			else
				return redirect('event');
        }
        elseif ($request->isMethod('post'))
        {
        	$lala = Event::find($id);
        	$lala->update(Input::all());
            return redirect('Event/detail/'.$id);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail($id)
	{
		$this->data['item'] = Event::find($id);
		if($this->data['item'])
			return view('pages.event.detail', $this->data);
		else
			return redirect('event');
	}

}

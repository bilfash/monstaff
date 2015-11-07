<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mark;
use App\User;
use App\Score;
use App\Event;
use App\Question;

class MarkController extends Controller {

  public function index(Request $request)
	{
      $mark = Mark::get();
      if($request->isMethod('get'))
      {
        $this->data['items']=$mark;
        return view('pages.mark.index', $this->data);
      }
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

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

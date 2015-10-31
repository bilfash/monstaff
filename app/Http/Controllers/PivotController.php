<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\Question;
use App\Pivot;

class PivotController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
      $this->data['items'] = Pivot::get();
          return view('pages.pivot.index', $this->data);

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
      $this->data['questions'] = Question::get();
      $this->data['events'] = Event::get();
        return view('pages.pivot.create', $this->data);
    }
    elseif ($request->isMethod('post'))
    {
      $data = $request->all();

      // dd($data);
      var_dump($data['questionid']);
      // Pivot::create($data);
        // return redirect('pivot');
    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Responses
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
		$pivot = Pivot::find($id);
		$pivot->delete();
		return redirect('pivot');
	}

}

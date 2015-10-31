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
      $this->data['pivots'] = Pivot::get();
      // return dd($this->data['pivots']);
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
      $this->data['events'] = Event::where('enabled','0')->get();
        return view('pages.pivot.create', $this->data);
    }
    elseif ($request->isMethod('post'))
    {
        $data = $request->all();
        // return var_dump($data);
        $event = Event::find($data['event']);
        $event->question()->sync($data['questions']);
        $satu = 1;
        $event->update(['enabled'=>1]);
        // Pivot::create($data);
            return redirect('event');


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

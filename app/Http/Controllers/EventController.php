<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Input;
use App\Event;
use App\Question;
use App\Pivot;

class EventController extends Controller {


  public function index()
	{
    $this->data['items'] = Event::orderBy('created_at','desc')->get();
    $this->data['pivots'] = Pivot::get();
		return view('pages.event.index', $this->data);
	}

	public function create(Request $request)
	{
		if ($request->isMethod('get'))
				{
          $this->data['items'] = Event::orderBy('created_at','desc')->get();
          $this->data['questions'] = Question::get();
          // return var_dump($this->data['questions']);
					return view('pages.event.create', $this->data);
				}
				elseif ($request->isMethod('post'))
				{
            $data = $request->all();

					  $event = Event::create($request->all());
            if($event)
            {
              if( array_key_exists ('questions', $data) ){
                $event->question()->sync($data['questions']);
                $event->update(['enabled'=>1]);
              }
              return redirect('event');
            }
            else
                return redirect('event');
		}
	}

	public function delete($id)
	{
    if($event = Event::find($id))
    {
        $event->question()->detach();
				$event->enabled = 0;
				$event->delete();
				return redirect('event');
		}
		else
		{
			return redirect('event');
		}
	}

	public function update(Request $request,$id)
	{
		if ($request->isMethod('get'))
        {
        	$this->data['items'] = Event::orderBy('created_at','asc')->get();
          $this->data['questions'] = Question::get();
        	$this->data['lala'] = Event::find($id);

          if($this->data['lala'])
				      return view('pages.event.update', $this->data);
			    else
				      return redirect('event');
      }
    elseif ($request->isMethod('post'))
    {
          $event = Event::find($id);
        	$event ->update($request->all());
          $event->question()->detach();

          if(isset($request->all()['questions']))
              $event->question()->sync($request->all()['questions']);

          return redirect('event/detail/'.$id);
    }
	}

	public function detail($id)
	{
		$this->data['item'] = Event::find($id);
		if($this->data['item'])
			return view('pages.event.detail', $this->data);
		else
			return redirect('event');
	}

	public function score(Request $request,$id)
	{
		if ($request->isMethod('get')){

			$this->data['items'] = Pivot::where('eventid',$id)->get();
			if($this->data['items'])
				return view('pages.event.score', $this->data);
			else
				return redirect('event');

		} else {
			$data = $request->all();
			foreach ($data['score'] as $key => $value) {
				$item = Pivot::find($key);
				$item->score = $value;
				$item->save();
			}
			return redirect('event/detail/'.$id);
		}
	}	

	public function question(Request $request,$id)
	{
		if ($request->isMethod('get')){
			$this->data['items'] = Pivot::where('eventid', $id)->where('deleted_at', null)->get();
			$this->data['questions'] = Question::get();
			return view('pages.event.question', $this->data);
		} else {
			// dd($request->all());
			$data = $request->all();
			$event = Event::find($id);
            if($event){
              	if( array_key_exists ('delete', $data) ){
              		foreach ($data['delete'] as $key => $value) {
              			$item  =  Pivot::find($value);
              			$item->delete();
              		}
              	}
              	if( array_key_exists ('pivot', $data) ){
                	foreach ($data['pivot'] as $key => $value) {
              			$item  =  new Pivot;
              			$item->eventid = $id;
              			$item->questionid = $value;
              			$item->save();
              		}
              	}
            }
			return redirect('event/detail/'.$id);
		}
	}

}

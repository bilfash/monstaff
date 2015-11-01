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

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\Question;
use App\Pivot;

class PivotController extends Controller {

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
        $event = Event::find($data['event']);
        $event->update(['enabled'=>1]);
            return redirect('event');


    }
	}

  public function update ($eventid, $newArray)
  {
      if($newArray!=NULL)
      {
        $event = Event::find($id);
        if($event->question != NULL)
        {
          Pivot::where('eventid',$eventid)->delete();
          $event->question()->sync($newArray);
        }
      }
      return redirect('event/detail/'.$eventid);
  }

	public function destroy($id)
	{
		$pivot = Pivot::find($id);
		$pivot->delete();
		return redirect('pivot');
	}

}

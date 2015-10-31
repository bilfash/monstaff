<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\Question;
use App\Pivot;

class PivotController extends Controller {

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

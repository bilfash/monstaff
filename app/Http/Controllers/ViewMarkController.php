<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Input;
use App\Question;
use App\Event;
use App\User;
use App\Score;
use App\Mark;
use App\Pivot;
use App\Flag;

class ViewMarkController extends Controller {

	public function wakahima()
	{
		if (Request::isMethod('get')){
			$this->data['events'] = Event::get();
			$this->data['staffs'] = null;
			return view('pages.viewmark.yes', $this->data);
		} else {
			// dd(Input::all());
			$this->data['events'] = Event::get();
			$this->data['id'] = Input::get('event');
			$this->data['staffs'] = Score::where('eventid',Input::get('event'))->get();;
			return view('pages.viewmark.wakahima', $this->data);

		}
	}

	public function detail($id,$userid)
	{
		$this->data['user'] = User::find($userid);
		$this->data['marks'] = Mark::where('userid',$userid)->get();
		return view('pages.viewmark.detail', $this->data);
	}

	public function dept()
	{
		if(Auth::user()->position->id == 1){

			$this->data['items'] = Score::where('userid',Auth::id())->get();
			return view('pages.viewmark.staff', $this->data);

		} else {
			if (Request::isMethod('get')){
				$this->data['events'] = Event::get();
				$this->data['staffs'] = null;
				return view('pages.viewmark.yes', $this->data);
			} else {
				// dd(Input::all());
				$this->data['events'] = Event::get();
				$user = Score::where('eventid',Input::get('event'))->get();
				foreach ($user as $key => $value) {
					if($value->user->deptid != Auth::user()->deptid){
						unset($user[$key]);
					}
				}
				$this->data['staffs'] = $user;
				return view('pages.viewmark.yes', $this->data);

			}
		}
	}

}

<?php namespace App\Http\Controllers;

// use App\Http\Requests;
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

class SubmitController extends Controller {

	public function submit($id){

		if(Auth::user()->position->id == 1){
			$data = Event::where('enabled', 1)->find($id);
			if(!$data){
				return redirect('/');
			}

			if(!$data->enabled){
				return redirect('/');
			}

			$cek = Flag::where('eventid' , $data->id )->where('from' , Auth::id())->first();
			if($cek != null){
				return redirect('/');
			}

			$this->data['event'] = $data;
			$this->data['questions'] = Pivot::where('eventid',$id)->get();
			return view('pages.submit.staff', $this->data);
		} 
		//kadept sekdept
		else {
		
			$departmentid = Auth::user()->deptid;
			$this->data['staffs'] = User::where('deptid' , $departmentid )->where('positionid' , 1)->get();
			$flag = array();
			foreach ($this->data['staffs'] as $staff) {
				$flag[$staff->id] = 1;
				if(Flag::where('eventid' , $id )->where('from', '!=' , $staff->id)->where('to' , $staff->id)->first()){
					$flag[$staff->id] = 0;
				}
			}
			$this->data['flag'] = $flag;
			$this->data['id'] = $id;
			return view('pages.submit.landing', $this->data);

		}
	}

	public function staff($id){
		
		$input = Input::get('score');

		$data = Event::where('enabled', 1)->find($id);
		if(!$data){
			return redirect('/');
		}

		if(!$data->enabled){
			return redirect('/');
		}

		// dd($input);

		//set ke mark
		foreach ($input as $key => $value) {
			$mark = new Mark;
			$mark->userid = Auth::id();
			$mark->questionid = $key;
			$mark->string = $value;
			$mark->save();
		}
		
		//set ke score
		$score = Score::where('eventid',$id)->where('userid',Auth::id())->first();
		if($score){
			foreach ($input as $key => $value) {
				$question = Question::find($key);
				if($question->type == 1){
					$pivot = Pivot::where('eventid',$id)->where('questionid',$key)->first();
					$score->score += ($value * $pivot->score / 100);
					$score->save();
				}
			}
		} else {
			$score = new Score;
			$score->eventid = $id;
			$score->userid = Auth::id();
			$score->score = 0;
			foreach ($input as $key => $value) {
				$question = Question::find($key);
				// dd($input);
				if($question->type == 1){
					$pivot = Pivot::where('eventid',$id)->where('questionid',$key)->first();
					$score->score += ($value * $pivot->score / 100);
					$score->save();
				}
			}
		}
		

		//set ke flag
		$flag = new Flag;
		$flag->from = Auth::id();
		$flag->to = Auth::id();
		$flag->eventid = $id;
		$flag->save();

		return redirect('/');

	}

	public function yes($id,$userid){


		if (Request::isMethod('get')){

			//cek event aktif, anaknya bukan, udah pernah ngisi belum, kadept bukan
			if(Auth::user()->positionid != 1){
				
				$user = User::find($userid);
				// dd($user->deptid);

				if( $user->deptid != Auth::user()->deptid ){
					return redirect('/');
				}
				
				$data = Event::where('enabled', 1)->find($id);
				if(!$data){
					return redirect('/');
				}

				if(!$data->enabled){
					return redirect('/');
				}

				$cek = Flag::where('eventid' , $id )->where('from', '!=' , $userid)->where('to' , $userid)->first();
				if($cek != null){
					return redirect('/');
				}

				$this->data['event'] = $data;
				$this->data['questions'] = Pivot::where('eventid',$id)->get();
				return view('pages.submit.yes', $this->data);
			} else {
				return redirect('/');
			}
			
		} else {

			$input = Input::get('score');

			$data = Event::where('enabled', 1)->find($id);
			if(!$data){
				return redirect('/');
			}

			if(!$data->enabled){
				return redirect('/');
			}

			// dd($input);

			//set ke mark
			foreach ($input as $key => $value) {
				$mark = new Mark;
				$mark->userid = $userid;
				$mark->questionid = $key;
				$mark->string = $value;
				$mark->save();
			}
			
			//set ke score
			$score = Score::where('eventid',$id)->where('userid', $userid )->first();
			if($score){
				foreach ($input as $key => $value) {
					$question = Question::find($key);
					if($question->type == 1){
						$pivot = Pivot::where('eventid',$id)->where('questionid',$key)->first();
						$score->score += ($value * $pivot->score / 100);
						$score->save();
					}
				}
			} else {
				$score = new Score;
				$score->eventid = $id;
				$score->userid = $userid;
				$score->score = 0;
				foreach ($input as $key => $value) {
					$question = Question::find($key);
					// dd($input);
					if($question->type == 1){
						$pivot = Pivot::where('eventid',$id)->where('questionid',$key)->first();
						$score->score += ($value * $pivot->score / 100);
						$score->save();
					}
				}
			}

			//set ke flag
			$flag = new Flag;
			$flag->from = Auth::id();
			$flag->to = $userid;
			$flag->eventid = $id;
			$flag->save();

			return redirect('submit/'.$id);
		}





	}

}


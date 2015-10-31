<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Feedback;
use DB;
use App\User;

class FeedbackController extends Controller {


	public function index()
	{
    // $this->data['items'] = DB::table('feedbacks')
    //         ->whereNull('feedbacks.deleted_at')
    //         ->join('users', 'feedbacks.id', '=', 'users.id')
    //         ->select('feedbacks.*', 'users.name')
    //         ->get();

    $this->data['items']=Feedback::get();

    // var_dump($this->data['items']);
		return view('pages.feedback.index', $this->data);
	}
  public function delete($id)
	{
		$feedback = Feedback::find($id);
		$feedback->delete();
		return redirect('feedback');
	}
}

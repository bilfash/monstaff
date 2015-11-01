<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Feedback;
use App\User;

class FeedbackController extends Controller {


	public function index()
	{
    $this->data['items']=Feedback::get();
		return view('pages.feedback.index', $this->data);
	}

  	public function delete($id)
	{
		$feedback = Feedback::find($id);
		$feedback->delete();
		return redirect('feedback');
	}

	public function detail($id)
	{
		$feedback = Feedback::find($id);
		return view('pages.feedback.detail', $this->data);
	}
}

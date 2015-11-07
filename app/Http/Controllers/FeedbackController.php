<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Input;
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

	public function create()
	{

		if (Request::isMethod('get')) 
        {
            return view('pages.feedback.create');
        }        
        elseif (Request::isMethod('post')) 
        {
        	$feedback = Feedback::create(Input::all());
            return redirect('/');
        }
	}
}

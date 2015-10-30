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
    $this->data['items'] = DB::table('feedbacks')
            ->join('users', 'feedbacks.id', '=', 'users.id')
            ->select('feedbacks.*', 'users.name')
            ->get();

    // var_dump($this->data['items']);
		return view('pages.feedback.index', $this->data);
	}

}

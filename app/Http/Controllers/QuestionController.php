<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Question;
use App\Event;
use App\Position;


class QuestionController extends Controller {

	public function getRoles()
  {
      return [
            ['id'=>1,'value'=>'Semua Fungsionaris'],
            ['id'=>2,'value'=>'Pengurus Harian'],
            ['id'=>3,'value'=>'Staff']
          ];
  }
	public function index(Request $request)
	{
      if ($request->isMethod('get'))
        {
          $this->data['roles'] = $this->getRoles();
          $this->data['items'] = Question::where('enabled',1)->get();
          return view('pages.question.index', $this->data);
        }
	}

	public function create(Request $request)
	{
  	if ($request->isMethod('get'))
    {
      $this->data['roles'] = $this->getRoles();
      $this->data['items'] = Question::where('enabled',1)->get();
        return view('pages.question.create', $this->data);
    }
    elseif ($request->isMethod('post'))
    {
      $data = $request->all();
      Question::create($data);
        return redirect('question');
    }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function detail($id)
  {
    $this->data['item'] = Question::find($id);
    $this->data['roles'] = $this->getRoles();
    if($this->data['item'])
        return view('pages.question.detail', $this->data);
    else
        return redirect('question');
	}


	public function update(Request $request, $id)
	{
    if ($request->isMethod('get'))
    {
        $this->data['roles'] = $this->getRoles();
        $this->data['items'] = Question::get();
        $this->data['old'] = Question::find($id);
        if($this->data['old'])
            return view('pages.question.update', $this->data);
        else
            return redirect('user');
    }
    elseif ($request->isMethod('post'))
    {
        $row = Question::find($id);
        $row->update($request->all());
        return redirect('question/detail/'.$id);
    }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$department = Question::find($id);
		$department->delete();
		return redirect('question');
	}


}

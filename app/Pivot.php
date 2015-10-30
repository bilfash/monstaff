<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pivot extends Model {


  	use SoftDeletes;

  	protected $table = 'pivot';

}

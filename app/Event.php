<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

	use SoftDeletes;

	protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'name',
        'start',
        'end',
        'enabled'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function question()
    {
    	return $this->hasMany('App\Question', 'eventid', 'id');
    }

    public function score()
    {
    	return $this->hasMany('App\Score', 'eventid', 'id');
    }

}

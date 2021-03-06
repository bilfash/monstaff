<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model {

	use SoftDeletes;

	  protected $table = 'questions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'title',
        'content',
        'helptext',
        'role',
        'type',
        'enabled'
    );

    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function mark()
    {
    	return $this->hasMany('App\Score', 'questionid', 'id');
    }

    public function event()
    {
      return $this->belongsToMany('App\Event', 'pivots','questionid','eventid')->withTimestamps()->withPivot('score');
    }

}

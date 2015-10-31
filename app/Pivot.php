<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pivot extends Model {


  	use SoftDeletes;

  	protected $table = 'pivots';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'eventid',
        'questionid',
        'score'
    );

    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function event()
    {
        return $this->belongsTo('App\Event', 'eventid')->withTimestamps();
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'questionid')->withTimestamps();
    }

}

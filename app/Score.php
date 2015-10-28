<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model {

	use SoftDeletes;

	protected $table = 'scores';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'userid',
        'eventid',
        'score'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function event()
    {
    	return $this->belongsTo('App\Event', 'eventid', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userid', 'id');
    }

}

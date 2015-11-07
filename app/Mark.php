<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model {

	use SoftDeletes;

	protected $table = 'marks';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'userid',
        'questionid',
        'value'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function question()
    {
    	return $this->belongsTo('App\Question', 'questionid', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userid', 'id');
    }

}

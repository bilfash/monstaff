<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model {

	use SoftDeletes;

	protected $table = 'feedbacks';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'userid',
        'content'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'userid', 'id');
    }

}

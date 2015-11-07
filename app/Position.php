<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model {

	use SoftDeletes;

	protected $table = 'positions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'name',
        'enabled'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->hasMany('App\User', 'positionid', 'id');
    }

}

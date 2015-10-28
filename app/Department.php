<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model {

	use SoftDeletes;

	protected $table = 'departments';
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
    	return $this->hasMany('App\User', 'departmentid', 'id');
    }

    public function permission()
    {
    	return $this->hasMany('App\Permission', 'departmentid', 'id');
    }

}

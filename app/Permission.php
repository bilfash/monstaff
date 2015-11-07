<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model {

	use SoftDeletes;

	protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'menuid',
        'departmentid'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'departmentid', 'id');
    }

}

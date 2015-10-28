<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model {

	use SoftDeletes;

	protected $table = 'menus';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'title',
        'name',
        'url',
        'status'
    );
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function permission()
    {
    	return $this->hasMany('App\Permission', 'menuid', 'id');
    }

}

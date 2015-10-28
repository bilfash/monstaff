<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = array(
        'name',
        'username',
        'password',
        'deptid',
        'positionid',
        'remember_token',
        'enabled',
        'grouproleid'
    );
    protected $effectiveMenu = null;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function score()
    {
    	return $this->hasMany('App\Score', 'userid', 'id');
    }

    public function mark()
    {
        return $this->hasMany('App\Mark', 'userid', 'id');
    }

    public function feedback()
    {
        return $this->hasMany('App\Feedback', 'userid', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'deptid', 'id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position', 'positionid', 'id');
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }	

}

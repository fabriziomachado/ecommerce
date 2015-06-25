<?php namespace CodeCommerce;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Profile extends Model  {


	protected $table = 'profiles';

	//protected $fillable = ['user_id','address'];

	//protected $hidden = ['user_id'];


    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

}

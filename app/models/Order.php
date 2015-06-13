<?php namespace CodeCommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

	public function items()
    {
        return $this->hasMany('CodeCommerce\Models\OrderItem');
    }

    public function users()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

}

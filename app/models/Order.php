<?php namespace CodeCommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


    protected $fillable = [
        'user_id',
        'total',
        'status',
        'pagseguro_trans_id'
    ];

    public $statusList = [
        0 => 'Pendente',
        1 => 'Autorizado',
        2 => 'Não Autorizado',
    ];

	public function items()
    {
        return $this->hasMany('CodeCommerce\Models\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function statusLabel()
    {
        return $this->statusList[$this->status];
    }

}

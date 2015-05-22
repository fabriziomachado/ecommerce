<?php namespace CodeCommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommend',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Models\Category');
    }

}

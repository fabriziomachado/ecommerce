<?php namespace CodeCommerce\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'extension'
    ];

    public function product()
    {
        return $this->belongsTo('CodeCommerce\Models\Product');
    }


    // use $productImage->file
    public function getPhotoAttribute()
    {
        return $this->id .".". $this->extension;
    }


}

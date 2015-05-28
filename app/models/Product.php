<?php namespace CodeCommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommend',
        'category_id'
    ];

    // relationships
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Models\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\Models\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Models\Tag');
    }

    // use $product->name_description
    public function getNameDescriptionAttribute()
    {
        return $this->name . " - " . $this->description;
    }

    // use $product->tag_list
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return implode(',', $tags);
    }

}

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
        'category_id',
        'tag_lis'
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


    // scopes
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1)->get();
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommend', '=', 1)->get();
    }

    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', '=', $type)->get();
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

    // use $product->tag_list = "tag1,tag2,tag3"
    public function setTagListAttribute($tags)
    {
        if(trim($tags)=="") return false;

        $tags = explode(',', $tags);
        foreach ($tags as $tag) {
            $tag_id = Tag::firstOrCreate(['name'=> trim($tag)])->id;
            $tag_ids[] =  $tag_id;
        }

        $this->tags()->sync($tag_ids);

        return true;
    }



}

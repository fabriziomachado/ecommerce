<?php namespace CodeCommerce\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = [
        'name',
        'description'
    ];

}

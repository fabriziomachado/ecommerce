<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Models\Category;
use CodeCommerce\Models\Product;

class StoreController extends Controller {

    private $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category->all();
    }

    public function index()
    {
        $categories = $this->categories;

        $products_featureds = Product::featured();
        $products_recommendeds = Product::recommended();

        return view('store.index', compact('categories', 'products_featureds', 'products_recommendeds'));
    }

    public function category($id)
    {
        $categories = $this->categories;

        $products = Product::ofCategory($id);


        return view('store.index', compact('categories', 'products'));
    }

}

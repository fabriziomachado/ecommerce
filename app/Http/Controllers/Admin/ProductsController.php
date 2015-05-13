<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Models\Product;

class ProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

	public function index()
	{
        $products = $this->productModel->all();

        return view('product.index', compact('products'));
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
